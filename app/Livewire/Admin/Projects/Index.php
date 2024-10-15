<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use App\Models\Sektor;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $year = '2024';
    public $sector = 'Semua Sektor';
    public $status = 'all';

    public function render()
{
    $projects = Project::query()
        ->when($this->search, function($query) {
            $query->where('judul', 'like', '%' . $this->search . '%');
        })
        ->when($this->year, function($query) {
            $query->whereYear('tgl_mulai', $this->year);
        })
        ->when($this->sector !== 'Semua Sektor', function($query) {
            $query->where('sektor_id', $this->sector); // Ganti dengan sektor_id
        })
        ->when($this->status !== 'all', function($query) {
            $query->where('status', $this->status);
        })
        ->paginate(10);

        if(Auth::user() && Auth::user()->hasRole('admin')) {
   return view('livewire.admin.projects.index', [
        'projects' => $projects,
        'sektors' => \App\Models\Sektor::all(), // Ambil data sektor dari database
    ])->layout('components.layouts.admin');
        }

 

    $sektors = Sektor::query()
    ->when($this->search, function($query) {
        $query->where('nama', 'like', '%' . $this->search . '%'); // Pencarian berdasarkan nama sektor
    })
    ->when($this->year, function($query) {
        $query->whereYear('created_at', $this->year); // Filter berdasarkan tahun sektor dibuat
    })
    ->when($this->status !== 'all', function($query) {
        $query->where('status', $this->status); // Filter berdasarkan status sektor
    })
    ->paginate(10); // Batasi hasil menjadi 10 data per halaman
    
    if(Auth::user() && Auth::user()->hasRole('admin')) {
        return view('livewire.admin.sektor.index', [
            'sektors' => $sektors,
        ])->layout('components.layouts.admin');
    }



}


    // Contoh download PDF (sesuai dengan penggunaan mPDF)
    function download_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
    }

    public function applyFilters()
{
    // Hanya memanggil render kembali untuk menerapkan filter
    $this->render();
}
}
