<?php

namespace App\Http\Controllers;

use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class ChartController extends Controller
{


    public function index()
    {
        // Contoh data statis
        $pieChart = LarapexChart::pieChart()
            ->setTitle('')
            ->setDataset([44, 55, 13, 33])
            ->setLabels(['Sektor 1', 'Sektor 2', 'Sektor 3', 'Sektor 4']);
    
        $barChart = LarapexChart::barChart()
            ->setTitle('')
            ->setDataset([
                [
                    'name' => 'Proyek CSR',
                    'data' => [30, 40, 45, 50, 49, 60, 70, 91, 125, 134, 145]
                ]
            ])
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']);
        $barChart2 = LarapexChart::barChart()
            ->setTitle('')
            ->setDataset([
                [
                    'name' => 'Proyek CSR',
                    'data' => [30, 40, 45, 50, 49, 60, 70, 91, 125, 134, 145]
                ]
            ])
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']);
        $barChart3 = LarapexChart::barChart()
            ->setTitle('')
            ->setDataset([
                [
                    'name' => 'Proyek CSR',
                    'data' => [30, 40, 45, 50, 49, 60, 70, 91, 125, 134, 145]
                ]
            ])
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']);

            
    return view('admin.dashboard', compact('pieChart', 'barChart', 'barChart2', 'barChart3'));
}

}
