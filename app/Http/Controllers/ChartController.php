<?php

namespace App\Http\Controllers;

use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class ChartController extends Controller
{


    public function index()
    {
        // Contoh data statis
        $pieChart = LarapexChart::pieChart()
            ->setTitle('Persentase total realisasi berdasarkan sektor CSR')
            ->setDataset([44, 55, 13, 33])
            ->setLabels(['Sektor 1', 'Sektor 2', 'Sektor 3', 'Sektor 4']);
    
        $barChart = LarapexChart::horizontalBarChart()
            ->setTitle('Total realisasi sektor CSR')
            ->setDataset([
                [
                    'name' => 'Proyek CSR',
                    'data' => [30, 40, 45, 50, 49, 60]
            
                    
                ]
            ])
            ->setColors(['#008FFB', '#00E396'])
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul']);

        $barChart2 = LarapexChart::horizontalBarChart()
            ->setTitle('Presentase total realisasi berdasarkan mitra')
            ->setDataset([
                [
                    'name' => 'Proyek CSR',
                    'data' => [30, 40, 45, 50, 49, 60]
                ]
            ])
            ->setColors(['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul']);
            
        $barChart3 = LarapexChart::horizontalBarChart()
            ->setTitle('Presentase total realisasi berdasarkan mitra')
            ->setDataset([
                [
                    'name' => 'Proyek CSR',
                    'data' => [30, 40, 45, 50, 49, 60]
                ]
            ])
            ->setColors(['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul']);

            
    return view('admin.dashboard', compact('pieChart', 'barChart', 'barChart2', 'barChart3'));
}

}
