<?php

namespace App\Livewire\admin\Dashboard;

use App\Models\Mitra;
use App\Models\Report;
use App\Models\Sektor;
use App\Models\Project;
use Livewire\Component;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class Chart extends Component
{
    public function render()
    {
        $jumlahMitra = Mitra::count(); // Menghitung jumlah mitra
        $jumlahCSR = Project::count(); // Menghitung jumlah mitra
        $jumlahApproved = Report::where('status', 'approved')->count();
        $totalDanaCsr = Report::sum('realisasi'); 
        
        // Set up charts here in render instead of assigning them to public properties

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

        // Return charts to the view
        return view('livewire.admin.dashboard.chart', [
            'pieChart' => $pieChart,
            'barChart' => $barChart,
            'barChart2' => $barChart2,
            'barChart3' => $barChart3
        ],compact('jumlahMitra', 'jumlahCSR', 'jumlahApproved', 'totalDanaCsr'));
    }
}
