<?php

namespace App\Livewire\Public\Statistik;

use App\Models\Mitra;
use App\Models\Report;
use App\Models\Sektor;
use App\Models\Project;
use Livewire\Component;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
       // Hitung data yang diperlukan
       $jumlahMitra = Mitra::count();
       $jumlahCSR = Project::count();
       $jumlahProyekTerealisasi = Project::where('status', 'terbit')->count();
       $totalDanaCsr = Report::sum('realisasi');

       // Data untuk pie chart
       $sektorsForPieChart = Sektor::with(['reports' => function ($query) {
           $query->select('sektor_id', DB::raw('SUM(realisasi) as total_realisasi'))->groupBy('sektor_id');
       }])->get();

       $labels = $sektorsForPieChart->pluck('nama')->toArray();
       $dataset = $sektorsForPieChart->map(function ($sektor) {
           return $sektor->reports->sum('total_realisasi') ?: 0;
       })->toArray();

       $pieChart = LarapexChart::pieChart()
           ->setTitle('Persentase Total Realisasi Berdasarkan Sektor CSR')
           ->setDataset($dataset)
           ->setLabels($labels);

       // Data untuk bar chart realisasi per sektor
       $sektorsForBarChart = Sektor::with(['reports' => function ($query) {
           $query->select('sektor_id', DB::raw('SUM(realisasi) as total_realisasi'))->groupBy('sektor_id');
       }])->get();

       $namabar = $sektorsForBarChart->pluck('nama')->toArray();
       $data1 = $sektorsForBarChart->map(function ($sektor) {
           return $sektor->reports->sum('total_realisasi') ?: 0;
       })->toArray();

       $barChart = LarapexChart::horizontalBarChart()
           ->setTitle('Total Realisasi Berdasarkan Sektor CSR')

           ->setColors(['#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
           ->setDataset([['name' => 'Realisasi', 'data' => $data1]])

           ->setXAxis($namabar);

       // Data untuk bar chart berdasarkan PT
       $realisasiPerPT = Report::with('mitra')
           ->selectRaw('mitra_id, SUM(realisasi) as total_realisasi')
           ->groupBy('mitra_id')
           ->get();

       $filteredRealisasiPerPT = $realisasiPerPT->filter(function ($report) {
           return !is_null($report->mitra) && !is_null($report->mitra->nama_pt);
       });

       $namaPt = $filteredRealisasiPerPT->pluck('mitra.nama_pt')->toArray();
       $totalRealisasiPT = $filteredRealisasiPerPT->pluck('total_realisasi')->toArray();

       $barChart2 = LarapexChart::horizontalBarChart()
           ->setTitle('Total Realisasi Berdasarkan PT')
           ->setDataset([['name' => 'Total Realisasi', 'data' => $totalRealisasiPT]])
           ->setColors(['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
           ->setXAxis($namaPt);

       // Data untuk bar chart realisasi per lokasi
       $realisasiPerLokasi = Report::select('lokasi', DB::raw('SUM(realisasi) as total_realisasi'))
           ->groupBy('lokasi')
           ->get();

       $lokasi = $realisasiPerLokasi->pluck('lokasi')->toArray();
       $totalRealisasiLokasi = $realisasiPerLokasi->pluck('total_realisasi')->toArray();

       $barChart3 = LarapexChart::horizontalBarChart()
           ->setTitle('Total Realisasi Berdasarkan Lokasi')
           ->setDataset([['name' => 'Proyek CSR', 'data' => $totalRealisasiLokasi]])
           ->setColors(['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
           ->setXAxis($lokasi);

        return view('livewire.public.statistik.index', [
            'pieChart' => $pieChart,
            'barChart' => $barChart,
            'barChart2' => $barChart2,
            'barChart3' => $barChart3,
            'jumlahMitra' => $jumlahMitra,
            'jumlahCSR' => $jumlahCSR,
            'jumlahProyekTerealisasi' => $jumlahProyekTerealisasi,
            'totalDanaCsr' => $totalDanaCsr,
        ])->layout('components.layouts.public');
    }
}
