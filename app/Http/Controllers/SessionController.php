<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = UserSession::with('user')
        ->orderByDesc('created_at') // Atau gunakan 'updated_at' jika lebih sesuai
        ->get();
        return view('sessions.index', compact('sessions'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'user_id' => 'required',
            'input_500' => 'required',
            'input_1000' => 'required',
            'input_2000' => 'required',
            'input_5000' => 'required',
            'input_10000' => 'required',
            'input_20000' => 'required',
            'input_50000' => 'required',
            'input_100000' => 'required',
            'status' => 'required',
            'amount_open' => 'required',
            'amount_closed' => 'required',
        ]);
    // ($validatedData);
        UserSession::create($validatedData);
    
        return redirect('/penjualan')->with('success', 'Open Session Berhasil.');
    }
    
    public function checkSessionStatus()
    {
        $session = UserSession::where('user_id', auth()->user()->id)
                        ->where('status', 1)
                        ->exists();
    
        return response()->json([
            'sessionExists' => $session,
            'sessionStatus' => ($session ? 1 : null), // Contoh, sesuaikan dengan struktur database Anda
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $session = UserSession::findOrFail($id);
        return view('sessions.detail', ['sessions' => $session]);
    }
    public function editSession($id)
    {
        $session = UserSession::findOrFail($id);
        return view('sessions.edit', ['session' => $session]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
            'input_500' => 'nullable|numeric',
            'input_1000' => 'nullable|numeric',
            'input_2000' => 'nullable|numeric',
            'input_5000' => 'nullable|numeric',
            'input_10000' => 'nullable|numeric',
            'input_20000' => 'nullable|numeric',
            'input_50000' => 'nullable|numeric',
            'input_100000' => 'nullable|numeric',
            'input_500_c' => 'nullable|numeric',
            'input_1000_c' => 'nullable|numeric',
            'input_2000_c' => 'nullable|numeric',
            'input_5000_c' => 'nullable|numeric',
            'input_10000_c' => 'nullable|numeric',
            'input_20000_c' => 'nullable|numeric',
            'input_50000_c' => 'nullable|numeric',
            'input_100000_c' => 'nullable|numeric',
            'amount_open' => 'nullable|numeric',
            'amount_closed' => 'nullable|numeric',
            'gap' => 'nullable|numeric',
            'information' => 'nullable|string|max:255',
        ]);
    
        // Temukan entri session yang akan diperbarui
        $session = UserSession::findOrFail($id);
    
        // Update data dengan data yang diterima dari request
        $session->update([
            'created_at' => $request->input('created_at'),
            'updated_at' => $request->input('updated_at'),
            'input_500' => $request->input('input_500'),
            'input_1000' => $request->input('input_1000'),
            'input_2000' => $request->input('input_2000'),
            'input_5000' => $request->input('input_5000'),
            'input_10000' => $request->input('input_10000'),
            'input_20000' => $request->input('input_20000'),
            'input_50000' => $request->input('input_50000'),
            'input_100000' => $request->input('input_100000'),
            'input_500_c' => $request->input('input_500_c'),
            'input_1000_c' => $request->input('input_1000_c'),
            'input_2000_c' => $request->input('input_2000_c'),
            'input_5000_c' => $request->input('input_5000_c'),
            'input_10000_c' => $request->input('input_10000_c'),
            'input_20000_c' => $request->input('input_20000_c'),
            'input_50000_c' => $request->input('input_50000_c'),
            'input_100000_c' => $request->input('input_100000_c'),
            'amount_open' => $request->input('amount_open'),
            'amount_closed' => $request->input('amount_closed'),
            'gap' => $request->input('gap'),
            'information' => $request->input('information'),
        ]);
    
        // Redirect atau tampilkan pesan sukses
        return redirect('/session')->with('success', 'Session Berhasil Di update.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getTotalJualHariIni()
    {
        $session = UserSession::where('status', true)->first();

        if ($session) {
            $totalJualHariIni = Penjualan::where('created_at', '>', $session->created_at)
                ->sum('total_payment');
        } else {
            $totalJualHariIni = 0;
        }

        return response()->json(['totalJualHariIni' => $totalJualHariIni]);
    }
    public function getAmountOpen()
    {
        $session = UserSession::where('status', true)->first();

        if ($session) {
            $amountOpen = $session->amount_open;

            return response()->json(['amount_open' => $amountOpen]);
        } else {
            return response()->json(['message' => 'Tidak ada sesi aktif'], 404);
        }
    }
}
