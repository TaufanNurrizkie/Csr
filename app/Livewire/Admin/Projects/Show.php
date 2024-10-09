<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;

class Show extends Component
{
    public $projectId;
    public $project;

    public function mount($id)
    {
        $this->projectId = $id;
        $this->project = Project::findOrFail($this->projectId);
    }

    public function render()
    {
        return view('livewire.admin.projects.show');
    }
}
