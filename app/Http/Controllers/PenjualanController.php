<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\UserSession;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan sale_id berikutnya dari database
        $nextSaleId = Penjualan::max('id') + 1;
        $produk = Produk::all();
        $detail_penjualan = DetailPenjualan::all();
        $sessions = UserSession::where('user_id', auth()->user()->id)
                    ->where('status', 1)
                    ->first(); 

        // Kemudian kirimkan nilai $amountClosed ke view
        return view('penjualans.index', [
            'produks' => $produk,
            'detail_penjualans' => $detail_penjualan,
            'nextSaleId' => $nextSaleId,
            'sessions' => $sessions, // Kirimkan nilai amountClosed ke view
        ]);
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
        // Validasi data
        $validatedData = $request->validate([
            'no_sale' => 'required',
            'date' => 'required',
            'name_cashier' => 'required',
            'discount' => 'required',
            'cash' => 'required',
            'return' => 'required',
            'subtotal' => 'required',
            'total_payment' => 'required',
        ]);
    
        // Simpan data penjualan
        Penjualan::create($validatedData);
    
        // Fetch detail penjualan data
        $detailPenjualan = DetailPenjualan::where('sale_id', $validatedData['no_sale'])->get();
    
        if ($request->has('export') && $request->get('export') == 'pdf') {
            // Load view 'pdf.struk' dengan data yang diberikan
            $pdf = PDF::loadView('pdf.struk', [
                'data' => $validatedData,
                'details' => $detailPenjualan
            ]);
    
            // Download file PDF dengan nama 'struk.pdf'
            return $pdf->stream('struk.pdf');
        }
    
        // Return some response or redirect after saving
        return redirect()->back()->with('success', 'Penjualan berhasil disimpan.');
    }
    
    
        
    public function addItem(Request $request)
    {
        try {
            // Validasi data yang diterima dari request
            $validatedData = $request->validate([
                'sale_id' => 'required',
                'productName' => 'required',
                'qty' => 'required',
                'unitPrice' => 'required',
                'totalHargaItem' => 'required',
            ]);
        
            // Simpan data ke dalam database detail penjualan
            DetailPenjualan::create([
                'sale_id' => $validatedData['sale_id'],
                'name_product' => $validatedData['productName'],
                'qty' => $validatedData['qty'],
                'unit_price' => $validatedData['unitPrice'],
                'total' => $validatedData['totalHargaItem']
            ]);

            // Kirim respons jika berhasil
            return response()->json(['message' => 'Data berhasil disimpan'], 200);
        } catch (\Exception $e) {
            // Tangani kesalahan dan kirim respons yang sesuai
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function updateProduk(Request $request)
    {
        // Validasi request jika diperlukan
        $request->validate([
            'idProduk' => 'required',
            'totalStok' => 'required|numeric',
        ]);

        // Perbarui data di tabel produk
        $product = Produk::find($request->idProduk);
        if (!$product) {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }

        $product->qty = $request->totalStok;
        $product->save();

        return response()->json(['success' => true]);
    }

    // public function updateSession(Request $request)
    // {
    //     // Validasi request jika diperlukan
    //     $request->validate([
    //         'idSession' => 'required',
    //         'amountClosed' => 'required|numeric',
    //         'totalPayment' => 'required|numeric',
    //     ]);

    //     // Perbarui data di tabel produk
    //     $session = UserSession::find($request->idSession);
    //     if (!$session) {
    //         return response()->json(['error' => 'Produk tidak ditemukan'], 404);
    //     }

    //     $session->amount_closed = $request->amountClosed + $request->totalPayment;
    //     $session->save();

    //     return response()->json(['success' => true]);
    // }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function hapus($id)
        {
            // Temukan data detail penjualan
            $detailPenjualan = DetailPenjualan::find($id);
            if (!$detailPenjualan) {
                return response()->json(['error' => 'Data penjualan tidak ditemukan'], 404);
            }
    
            // Temukan produk terkait berdasarkan name_product
            $product = Produk::where('name_product', $detailPenjualan->name_product)->first();
            if ($product) {
                // Perbarui kuantitas produk
                $product->qty += $detailPenjualan->qty;
                $product->save();
            }
    
            // Hapus data penjualan
            $detailPenjualan= DetailPenjualan::destroy($id);
    
            return response()->json(['success' => 'Data penjualan berhasil dihapus'], 200);
        }
        public function updateItem(Request $request)
        {
            // dd($request->all());
            $request->validate([
                'id' => 'required|integer|exists:detail_penjualans,id',
                'no_sale' => 'required|integer|exists:penjualans,id',
                'name' => 'required',
                'qty' => 'required|integer|min:1',
                'price' => 'required|integer|min:1',
                'updated_subtotal' => 'required|integer',
                'updated_total_payment' => 'required|integer',
                'old_qty' => 'required|integer',
            ]);
            
            $itemId = $request->input('id');
            $noSale = $request->input('no_sale');
            $nameProduct = $request->input('name');
            $qty = $request->input('qty');
            $price = $request->input('price');
            $total = $qty * $price;
            $subTotal = $request->input('updated_subtotal');
            $totalPayment = $request->input('updated_total_payment');
            $oldQty = $request->input('old_qty');
        
            // Temukan item dan update sesuai data
            $item = DetailPenjualan::where('id', $itemId)->where('sale_id', $noSale)->first();
            if (!$item) {
                return redirect()->back()->with('error', 'Item not found.');
            }
        
            $item->qty = $qty;
            $item->unit_price = $price;
            $item->total = $total;
            $item->save();
        
            // Update subtotal dan total pembayaran
            $penjualan = Penjualan::find($noSale);
            if (!$penjualan) {
                return redirect()->back()->with('error', 'Sale not found.');
            }
        
            $penjualan->subtotal = $subTotal;
            $penjualan->total_payment = $totalPayment;
            $penjualan->save();

            $produk = Produk::where('name_product', $nameProduct)->first();
            if (!$produk) {
                return redirect()->back()->with('error', 'Product not found.');
            }
            // Debugging values

            $newQty = $produk->qty - $oldQty;

            
            $produk->qty = $newQty;
            $produk->save();

            return redirect()->back()->with('success', 'Item updated successfully.');
        }
        public function printReceipt(Request $request)
        {
            // Ambil detail penjualan berdasarkan no_sale
            $penjualan = Penjualan::findOrFail($request->input('no_sale'));
            $detailPenjualan = DetailPenjualan::where('sale_id', $penjualan->id)->get();
            
            // Siapkan data untuk tampilan PDF
            $data = [
                'no_sale' => $penjualan->id,
                'date' => $penjualan->date,
                'name_cashier' => $penjualan->name_cashier,
                'discount' => $penjualan->discount,
                'subtotal' => $penjualan->subtotal,
                'total_payment' => $penjualan->total_payment,
            ];
        
            // Muat tampilan 'pdf.struk' dengan data
            $pdf = PDF::loadView('pdf.struk_2', [
                'data' => $data,
                'details' => $detailPenjualan
            ]);
        
            // Alirkan file PDF
            return $pdf->stream('struk_2.pdf');
        }

}
