<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;


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
                $query->where('sector', $this->sector);
            })
            ->when($this->status !== 'all', function($query) {
                $query->where('status', $this->status);
            })
            ->paginate(10);

        return view('livewire.admin.projects.index', [
            'projects' => $projects,
        ]);
    }

    public function downloadCsv()
    {
        $projects = Project::all();

        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=projects.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Judul', 'Lokasi', 'Jumlah Mitra', 'Tgl Mulai', 'Tgl Akhir', 'Tgl Diterbitkan', 'Status']);

        foreach ($projects as $project) {
            fputcsv($handle, [
                $project->judul,
                $project->lokasi,
                $project->jumlah_mitra,
                $project->tgl_mulai,
                $project->tgl_akhir,
                $project->tgl_diterbitkai,
                $project->status,
            ]);
        }

        fclose($handle);
        return response()->stream(function () use ($handle) {
            fclose($handle);
        }, 200, $headers);
    }

    public function downloadPdf()
    {
        // Ambil data yang diperlukan
        $projects = Project::all(); // Sesuaikan ini dengan data yang ingin Anda gunakan
    
        // Buat PDF menggunakan view dan data
        $pdf = Pdf::loadView('pdf_view', ['projects' => $projects]); // Ganti 'pdf_view' dengan nama view Anda
    
        // Unduh file PDF
        return $pdf->download('projects.pdf');
    }
}
