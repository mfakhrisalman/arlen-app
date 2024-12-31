<?php

namespace App\Charts;

use App\Models\Penjualan;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class IncomeForOneYearChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $currentYear = Carbon::now()->year;
        $monthlySales = [];
        
        for ($month = 1; $month <= 12; $month++) {
            $totalJual = Penjualan::whereMonth('date', $month)
                                  ->whereYear('date', $currentYear)
                                  ->sum('total_payment');
            $monthlySales[] = $totalJual;
        }
        
        return $this->chart->barChart()
            ->addData('Total Penjualan', $monthlySales)
            ->setHeight(250)
            ->setXAxis(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
    }
}
