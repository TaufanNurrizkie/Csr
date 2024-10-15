<?php

namespace App\Livewire\Public\Home;

use App\Models\Activity;
use App\Models\Mitra;
use App\Models\Report;
use App\Models\Sektor;
use App\Models\Project;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $mitras = Mitra::all(); // Mengambil semua data mitras
        $sektors = Sektor::all();
        $aktivitas = Activity::where('status', 'Terbit')->latest()->take(4)->get();
        $reports = Report::where('status', 'Approved')->latest()->take(4)->get();
        $jumlahMitra = Mitra::count();
        $jumlahCSR = Project::count();
        $jumlahApproved = Report::where('status', 'approved')->count();
        $totalDanaCsr = Report::sum('realisasi');
        return view('livewire.public.home.index', [
            'mitras' => $mitras,
            'sektors' => $sektors,
            'aktivitas' => $aktivitas,
            'reports' => $reports,
            'jumlahMitra' => $jumlahMitra,
            'jumlahCSR' => $jumlahCSR,
            'jumlahApproved' => $jumlahApproved,
            'totalDanaCsr' => $totalDanaCsr,

        ]);
    }
}
