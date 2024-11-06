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
        $user = Auth::user();

        // Proses data proyek
        $projects = Project::query()
            ->when($this->search, fn($query) => $query->where('judul', 'like', '%' . $this->search . '%'))
            ->when($this->year, fn($query) => $query->whereYear('tgl_mulai', $this->year))
            ->when($this->sector !== 'Semua Sektor', fn($query) => $query->where('sektor_id', $this->sector))
            ->when($this->status !== 'all', fn($query) => $query->where('status', $this->status))
            ->paginate(10);

        // Proses data sektor
        $sektors = Sektor::query()
            ->when($this->search, fn($query) => $query->where('nama', 'like', '%' . $this->search . '%'))
            ->when($this->year, fn($query) => $query->whereYear('created_at', $this->year))
            ->when($this->status !== 'all', fn($query) => $query->where('status', $this->status))
            ->paginate(10);

        // Hitung data yang diperlukan
        $jumlahMitra = Mitra::count();
        $jumlahCSR = Project::count();
        $jumlahApproved = Report::where('user_id', $user->id)->where('status', 'approved')->count();
        $totalDanaCsr = Report::where('user_id', $user->id)->sum('realisasi');


        // Data untuk pie chart
        $sektorsForPieChart = Sektor::with(['reports' => function ($query) {
            $query->select('sektor_id', DB::raw('SUM(realisasi) as total_realisasi'))->groupBy('sektor_id');
        }])->get();

        // Ambil label dan data dari sektor
        $labels = $sektorsForPieChart->pluck('nama')->toArray();
        $dataset = $sektorsForPieChart->map(fn($sektor) => $sektor->reports->sum('total_realisasi') ?: 0)->toArray();

        // Membuat pie chart
        $pieChart = LarapexChart::pieChart()
            ->setTitle('Persentase Total Realisasi Berdasarkan Sektor CSR')
            ->setLabels($labels)   // Mengatur label
            ->setDataset($dataset); // Mengatur dataset


        // Data untuk bar chart realisasi per sektor
        $dataBarChart = $sektorsForPieChart->map(function ($sektor) {
            return $sektor->reports->sum('total_realisasi') ?: 0; // Gunakan angka langsung
        })->toArray();

        $labels = $sektorsForPieChart->pluck('nama')->toArray(); // Nama sektor untuk X-axis

        $barChart = LarapexChart::horizontalBarChart()
            ->setTitle('Total Realisasi Berdasarkan Sektor CSR')
            ->setColors(['#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe'])
            ->setDataset([[
                'name' => 'Realisasi', // Nama umum untuk seluruh dataset
                'data' => $dataBarChart // Data tanpa array ganda
            ]])
            ->setXAxis($labels); // Set label sesuai nama sektor pada X-axis


        // Data untuk bar chart realisasi per lokasi
        $realisasiPerLokasi = Report::select('lokasi', DB::raw('SUM(realisasi) as total_realisasi'))
            ->groupBy('lokasi')
            ->get();

        $lokasi = $realisasiPerLokasi->pluck('lokasi')->toArray();
        $totalRealisasiLokasi = $realisasiPerLokasi->pluck('total_realisasi')->toArray();

        $barChart2 = LarapexChart::horizontalBarChart()
            ->setTitle('Total Realisasi Proyek CSR Berdasarkan Lokasi')
            ->setDataset([['name' => 'Proyek CSR', 'data' => $totalRealisasiLokasi]])
            ->setColors(['#ff455f', '#775dd0', '#80effe'])
            ->setXAxis($lokasi);

        // Ambil laporan yang terkait dengan user yang sedang login
        $reports = Report::where('user_id', $user->id)
            ->where('title', 'like', '%' . $this->search . '%')
            ->paginate(10);

        // Kembalikan view dengan semua data
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
