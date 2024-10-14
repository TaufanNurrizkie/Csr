<?php

namespace App\Http\Controllers;

use App\Models\Sektor;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class ChartController extends Controller
{


    public function index()
    {
        // Contoh data statis
        $sektors = Sektor::select('nama')
        ->groupBy('nama')
        ->selectRaw('count(*) as jumlah, nama')
        ->get();

    // Mengambil nama sektor dan jumlahnya
    $labels = $sektors->pluck('nama')->toArray(); // ['Pendidikan', 'Kesehatan', ...]
    $dataset = $sektors->pluck('jumlah')->toArray(); // [2, 3, ...] berdasarkan frekuensi nama sektor

    // Membuat pie chart
    $pieChart = LarapexChart::pieChart()
        ->setTitle('Persentase total realisasi berdasarkan sektor CSR')
        ->setDataset($dataset)
        ->setLabels($labels);
    
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
