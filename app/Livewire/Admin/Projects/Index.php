<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $year = '2024';
    public $sector = 'Semua Sektor';
    public $status = 'Semua';

    public function render()
    {
        $projects = Project::when($this->search, function($query) {
            $query->where('judul', 'like', '%' . $this->search . '%');
        })
        ->paginate(10);

        return view('livewire.admin.projects.index', [
            'projects' => $projects,
        ]);
    }
}