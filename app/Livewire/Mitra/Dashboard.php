<?php

namespace App\Livewire\Mitra;

use App\Models\Mitra;
use App\Models\Report;
use App\Models\Sektor;
use App\Models\Project;
use Livewire\Component;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $search;
    public $year;
    public $sector = 'Semua Sektor';
    public $status = 'all';

    public function render()
    {
        // Proses data proyek
        $projects = Project::query()
            ->when($this->search, function ($query) {
                $query->where('judul', 'like', '%' . $this->search . '%');
            })
            ->when($this->year, function ($query) {
                $query->whereYear('tgl_mulai', $this->year);
            })
            ->when($this->sector !== 'Semua Sektor', function ($query) {
                $query->where('sektor_id', $this->sector);
            })
            ->when($this->status !== 'all', function ($query) {
                $query->where('status', $this->status);
            })
            ->paginate(10);

        // Proses data sektor
        $sektors = Sektor::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->when($this->year, function ($query) {
                $query->whereYear('created_at', $this->year);
            })
            ->when($this->status !== 'all', function ($query) {
                $query->where('status', $this->status);
            })
            ->paginate(10);

            $user = Auth::user();
            
        // Hitung data yang diperlukan
        $jumlahMitra = Mitra::count();
        $jumlahCSR = Project::count();
     // Menghitung jumlah laporan yang statusnya 'approved' dan terkait dengan user yang sedang login
$jumlahApproved = Report::where('user_id', $user->id)
->where('status', 'approved')
->count();

// Menghitung total dana CSR dari laporan yang terkait dengan user yang sedang login
$totalDanaCsr = Report::where('user_id', $user->id)->sum('realisasi');

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


        // Data untuk bar chart realisasi per lokasi
        $realisasiPerLokasi = Report::select('lokasi', DB::raw('SUM(realisasi) as total_realisasi'))
            ->groupBy('lokasi')
            ->get();

        $lokasi = $realisasiPerLokasi->pluck('lokasi')->toArray();
        $totalRealisasiLokasi = $realisasiPerLokasi->pluck('total_realisasi')->toArray();

        $barChart2 = LarapexChart::horizontalBarChart()
            ->setTitle('Total realisasi proyek CSR berdasarkan lokasi')
            ->setDataset([['name' => 'Proyek CSR', 'data' => $totalRealisasiLokasi]])
            ->setColors(['#ff455f', '#775dd0', '#80effe'])
            ->setXAxis($lokasi);


           // Ambil ID pengguna yang sedang login
    $userId = Auth::user()->id;

    // Ambil laporan yang terkait dengan user_id
    $reports = Report::where('user_id', $userId) // Gunakan user_id sebagai filter
        ->where('title', 'like', '%'.$this->search.'%')
        ->paginate(10); // Sesuaikan pagination jika diperlukan

        // Kembalikan view dengan semua data
        if(Auth::user() && Auth::user()->hasRole('mitra')) {
            return view('livewire.mitra.dashboard', [
                'pieChart' => $pieChart,
                'barChart' => $barChart,
                'barChart2' => $barChart2,
                'jumlahMitra' => $jumlahMitra,
                'jumlahCSR' => $jumlahCSR,
                'jumlahApproved' => $jumlahApproved,
                'totalDanaCsr' => $totalDanaCsr,
                'sektors' => $sektors,
                'projects' => $projects,
                'reports' => $reports,
            ])->layout('components.layouts.mitra');
        }
    }
}

