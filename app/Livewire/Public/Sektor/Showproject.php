<?php

namespace App\Livewire\Public\Sektor;

use App\Models\Project;
use Livewire\Component;

class Showproject extends Component
{
    public $projectId; // Menyimpan ID proyek
    public $project;

    public function mount($id)
    {
        // Ambil proyek berdasarkan ID
        $this->project = Project::find($id);
    }

    public function render()
    {
        return view('livewire.public.sektor.showproject')->layout('components.layouts.public');
    }
}
