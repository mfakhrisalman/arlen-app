<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
    
        if (Auth::attempt(['name' => $credentials['name'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
    
            return redirect()->intended('/dashboard');
        }
    
        return back()->with('loginError', 'Login Gagal!');
    }
    public function logout(Request $request)
    {
        // Mendapatkan pengguna yang saat ini diautentikasi
        $user = Auth::user();
    
        // Cek apakah pengguna adalah cashier
        if ($user->is_cashier) {
            // Mendapatkan sesi terakhir pengguna yang masih aktif
            $session = UserSession::where('user_id', $user->id)
                                  ->where('status', 1)
                                  ->latest()
                                    ->first();
                                 
            if ($session) {
                $session->status = 0;
    
                // Ambil data nominal uang dari request
                $session->input_500_c = $request->input('input_500_c');
                $session->input_1000_c = $request->input('input_1000_c');
                $session->input_2000_c = $request->input('input_2000_c');
                $session->input_5000_c = $request->input('input_5000_c');
                $session->input_10000_c = $request->input('input_10000_c');
                $session->input_20000_c = $request->input('input_20000_c');
                $session->input_50000_c = $request->input('input_50000_c');
                $session->input_100000_c = $request->input('input_100000_c');
                $session->amount_closed = $request->input('amountci_closed');
                $session->information = $request->input('information');
    
                // Konversi amount_closed dan amount_open ke tipe numerik jika perlu
                $amountClosed = intval($session->amount_closed);
                $amountOpen = intval($session->amount_open);
    
                // Hitung nilai gap (selisih amount_closed dan amount_open)
                $session->gap = $amountClosed - $amountOpen;
    
                // Simpan perubahan
                $session->save();
            }
        }
    
        // Logout pengguna dari aplikasi
        Auth::logout();
    
        // Mematikan sesi saat ini dan meregenerasi token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
    
    
}
