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


    function download_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
    }
}
