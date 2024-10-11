<?php

namespace App\Livewire\admin\Dashboard;

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
        $jumlahMitra = Mitra::count(); // Menghitung jumlah mitra
        $jumlahCSR = Project::count(); // Menghitung jumlah mitra
        $jumlahApproved = Report::where('status', 'approved')->count();
        $totalDanaCsr = Report::sum('realisasi');
        $reports = Report::select('mitra', 'realisasi')->get();

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

        $namabar = $sektors->pluck('nama')->toArray(); // ['Mitra A', 'Mitra B', ...]
        $data1 = $reports->pluck('realisasi')->toArray(); // [100, 200, ...]


        $barChart = LarapexChart::horizontalBarChart()
            ->setTitle('Total realisasi sektor CSR')
            ->setDataset([
                [
                    'name' => 'Realisasi',
                    'data' => $data1 // Data realisasi dalam bentuk array satu dimensi
                ]
            ])
            ->setColors(['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
            ->setXAxis($namabar); // Nama mitra/sektor pada sumbu X


        $realisasi = DB::table('reports')
            ->join('mitras', 'reports.id', '=', 'mitras.id') // Mengganti 'mitra_id' dengan kolom yang sesuai
            ->select('mitras.nama_pt', DB::raw('SUM(realisasi) as total_realisasi'))
            ->groupBy('mitras.nama_pt')
            ->get();


        // Data dari laporan sektor CSR
        $namaPt = $realisasi->pluck('nama_pt')->toArray(); // Nama PT ['PT A', 'PT B', ...]
        $totalRealisasi = $realisasi->pluck('total_realisasi')->toArray();


        $barChart2 = LarapexChart::horizontalBarChart()
            ->setTitle('Presentase Total Realisasi Berdasarkan PT')
            ->setDataset([
                [
                    'name' => 'Total Realisasi',
                    'data' => $totalRealisasi // Total realisasi berdasarkan nama_pt
                ]
            ])
            ->setColors(['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
            ->setXAxis($namaPt); // Nama PT sebagai label sumbu X


        $reports = DB::table('reports')
            ->select('lokasi', DB::raw('SUM(realisasi) as total_realisasi')) // Menghitung total realisasi berdasarkan lokasi
            ->groupBy('lokasi')
            ->get();

        // Menyiapkan data untuk chart
        $lokasi = $reports->pluck('lokasi')->toArray(); // Ambil nama lokasi
        $totalRealisasi = $reports->pluck('total_realisasi')->toArray(); // Ambil total realisasi

        // Membuat chart
        $barChart3 = LarapexChart::horizontalBarChart()
            ->setTitle('Presentase Total Realisasi Berdasarkan Lokasi')
            ->setDataset([
                [
                    'name' => 'Proyek CSR',
                    'data' => $totalRealisasi // Total realisasi berdasarkan lokasi
                ]
            ])
            ->setColors(['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
            ->setXAxis($lokasi); // Nama lokasi sebagai label sumbu X


        // Return charts to the view
        return view('livewire.admin.dashboard.chart', [
            'pieChart' => $pieChart,
            'barChart' => $barChart,
            'barChart2' => $barChart2,
            'barChart3' => $barChart3
        ], compact('jumlahMitra', 'jumlahCSR', 'jumlahApproved', 'totalDanaCsr'));
    }
}
