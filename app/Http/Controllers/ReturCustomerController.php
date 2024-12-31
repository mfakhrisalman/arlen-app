<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\ReturnCustomer;
use Illuminate\Http\Request;

class ReturCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $retur = ReturnCustomer::all(); 
        return view('retursCustomer.index', ['retur_customers' => $retur]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sale = Penjualan::all(); 
        return view('retursCustomer.create', ['sales' => $sale]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_transaction' => 'required',
            'date' => 'required',
            'mistake' => 'required',
            'status' => 'required',
        ]);

        ReturnCustomer::create($validatedData);

        return redirect('/retur-customer')->with('success', 'Data Retur Kostumer Berhasil Ditambahkan');
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
    public function edit(ReturnCustomer $retur_customer)
    {
        $transaksis = Penjualan::all(); // Ambil semua transaksi
        return view('retursCustomer.edit', [
            'retur_customer' => $retur_customer,
            'transaksis' => $transaksis
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReturnCustomer $retur_customer)
    {
        $validatedData = $request->validate([
            'id_transaction' => 'required',
            'date' => 'required',
            'mistake' => 'required',
            'status' => 'required',
        ]);

        // Perbarui data pada database
        $retur_customer->update($validatedData);
    
        return redirect('/retur-customer')->with('success', 'Data Berhasil Diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $retur_customer = ReturnCustomer::find($id);
        if ($retur_customer) {
            $retur_customer->delete();
        }
        return redirect('/retur-customer')->with('success', 'Data Retur Berhasil Dihapus');
    }
}
