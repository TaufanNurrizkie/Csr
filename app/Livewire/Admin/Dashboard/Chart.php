<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Mitra;
use App\Models\Report;
use App\Models\Sektor;
use App\Models\Project;
use Livewire\Component;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Illuminate\Support\Facades\DB;

class Chart extends Component
{
    public function render()
    {
        // Menghitung data
        $jumlahMitra = Mitra::count(); // Total mitra
        $jumlahCSR = Project::count(); // Total CSR
        $jumlahApproved = Report::where('status', 'approved')->count(); // Laporan Approved
        $totalDanaCsr = Report::sum('realisasi'); // Total dana CSR
        $reports = Report::select('mitra', 'realisasi')->get();

        // Data untuk pie chart sektor berdasarkan total realisasi
        $sektors = Sektor::with(['reports' => function ($query) {
            $query->select('sektor_id', DB::raw('SUM(realisasi) as total_realisasi'))
                ->groupBy('sektor_id');
        }])->get();

        $labels = $sektors->pluck('nama')->toArray();
        $dataset = $sektors->map(function ($sektor) {
            // Mengambil total realisasi dari laporan yang terhubung
            return $sektor->reports->sum('total_realisasi') ?: 0; // Menghindari null
        })->toArray();

        // Pastikan untuk membuat pie chart dengan dataset yang benar
        $pieChart = LarapexChart::pieChart()
            ->setTitle('Persentase Total Realisasi Berdasarkan Sektor CSR')
            ->setDataset($dataset)
            ->setLabels($labels)
            ->setColors(['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe']); // Menetapkan warna untuk pie chart

        // Data untuk bar chart realisasi berdasarkan total realisasi per sektor
        $sektors = Sektor::with(['reports' => function ($query) {
            $query->select('sektor_id', DB::raw('SUM(realisasi) as total_realisasi'))
                ->groupBy('sektor_id');
        }])->get();

        // Ambil nama sektor dan total realisasi
        $namabar = $sektors->pluck('nama')->toArray();
        $data1 = $sektors->map(function ($sektor) {
            // Mengambil total realisasi dari laporan yang terhubung
            return $sektor->reports->sum('total_realisasi') ?: 0; // Menghindari null
        })->toArray();

        $barChart = LarapexChart::horizontalBarChart()
            ->setTitle('Total Realisasi Berdasarkan Sektor CSR')
            ->setDataset([[
                'name' => 'Realisasi',
                'data' => $data1 // Total realisasi berdasarkan sektor
            ]])
            ->setColors(['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
            ->setXAxis($namabar);


        // Chart Realisasi Berdasarkan PT (Eloquent Query)
        $realisasiPerPT = Report::with('mitra') // Meload relasi mitra
            ->selectRaw('mitra_id, SUM(realisasi) as total_realisasi')
            ->groupBy('mitra_id')
            ->get();

        // Memfilter mitra yang memiliki nama_pt (tidak null)
        $filteredRealisasiPerPT = $realisasiPerPT->filter(function ($report) {
            return !is_null($report->mitra) && !is_null($report->mitra->nama_pt); // Hanya yang ada mitra dan nama_pt
        });

        // Mengambil nama PT dan total realisasi dari data yang sudah difilter
        $namaPt = $filteredRealisasiPerPT->pluck('mitra.nama_pt')->toArray();
        $totalRealisasiPT = $filteredRealisasiPerPT->pluck('total_realisasi')->toArray();

        $barChart2 = LarapexChart::horizontalBarChart()
            ->setTitle('Total Realisasi Berdasarkan PT')
            ->setDataset([['name' => 'Total Realisasi', 'data' => $totalRealisasiPT]])
            ->setColors(['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
            ->setXAxis($namaPt);


        // Data untuk bar chart realisasi per lokasi (Eloquent Query)
        $realisasiPerLokasi = Report::select('lokasi', DB::raw('SUM(realisasi) as total_realisasi'))
            ->groupBy('lokasi')
            ->get();

        $lokasi = $realisasiPerLokasi->pluck('lokasi')->toArray();
        $totalRealisasiLokasi = $realisasiPerLokasi->pluck('total_realisasi')->toArray();

        $barChart3 = LarapexChart::horizontalBarChart()
            ->setTitle('Total Realisasi Berdasarkan Lokasi')
            ->setDataset([[
                'name' => 'Proyek CSR',
                'data' => $totalRealisasiLokasi
            ]])
            ->setColors(['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
            ->setXAxis($lokasi);


        // Mengembalikan view dengan data chart
        return view('livewire.admin.dashboard.chart', [
            'pieChart' => $pieChart,
            'barChart' => $barChart,
            'barChart2' => $barChart2,
            'barChart3' => $barChart3,
            'jumlahMitra' => $jumlahMitra,
            'jumlahCSR' => $jumlahCSR,
            'jumlahApproved' => $jumlahApproved,
            'totalDanaCsr' => $totalDanaCsr,
        ]);
    }
}
