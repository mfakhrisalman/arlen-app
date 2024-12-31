<?php
namespace App\Http\Controllers;

use App\Charts\BestSellingProductChart;
use App\Charts\IncomeForOneYearChart; // Tambahkan ini
use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\UserSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Contracts\Session\Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BestSellingProductChart $chart, IncomeForOneYearChart $incomeChart) // Tambahkan $incomeChart
    {
        $today = Carbon::today();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        
        // Menghitung total penjualan pada bulan ini
        $totalJual = Penjualan::whereMonth('date', $currentMonth)
                            ->whereYear('date', $currentYear)
                            ->sum('total_payment');       
        $totalDiskon = Penjualan::whereMonth('date', $currentMonth)
        ->whereYear('date', $currentYear)
        ->sum('discount');

        // Menghitung total pembelian pada bulan ini
        $totalBeli = Pembelian::whereMonth('date', $currentMonth)
                              ->whereYear('date', $currentYear)
                              ->sum('total');
                              
        $totalBarang = Penjualan::whereMonth('date', $currentMonth)
        ->whereYear('date', $currentYear)
        ->with('details')
        ->get()
        ->sum(function($pembelian) {
            return $pembelian->details->sum('qty');
        });

        $totalDibeli = Pembelian::whereMonth('date', $currentMonth)
        ->whereYear('date', $currentYear)
        ->get()
        ->sum('qty');

        $produk = Produk::orderBy('created_at', 'desc')->get();
        $produku = Produk::whereNotNull('updated_at')->orderBy('updated_at', 'desc')->get();

        $session = UserSession::where('status', true)->first();
        if ($session) {
            $totalJualHariIni = Penjualan::where('created_at', '>', $session->created_at)
                ->sum('total_payment');
        } else {
            $totalJualHariIni = 0;
        }

        $totalJualHariIniA = Penjualan::where('date',$today)->sum('total_payment');
        return view('dashboard', [
            'totalJual' => $totalJual,
            'totalDiskon' => $totalDiskon,
            'totalBeli' => $totalBeli,
            'totalBarang' => $totalBarang,
            'totalDibeli' => $totalDibeli,
            'produk' => $produk,
            'produku' => $produku,
            'totalJualHariIni' => $totalJualHariIni,
            'totalJualHariIniA' => $totalJualHariIniA,
            'chart' => $chart->build(),
            'incomeChart' => $incomeChart->build() // Tambahkan ini
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
        //
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
    public function edit(string $id)
    {
        //
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
}
