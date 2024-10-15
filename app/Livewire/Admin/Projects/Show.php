<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user() && Auth::user()->hasRole('admin')) {
            return view('livewire.admin.projects.show')->layout('components.layouts.admin');
        }
    
    }
}
