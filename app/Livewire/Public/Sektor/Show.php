<?php

namespace App\Livewire\Public\Sektor;

use App\Models\Sektor;
use Livewire\Component;

class Show extends Component
{
    public $sektor;
    public $projects = [];

    public function mount($id)
    {
        // Mengambil sektor berdasarkan ID yang diterima
        $this->sektor = Sektor::findOrFail($id);

        $this->projects = $this->sektor->projects;
    }

    public function render()
    {
        return view('livewire.public.sektor.show', [
            'sektor' => $this->sektor,
            'projects' => $this->projects,
        ])->layout('components.layouts.public');
    }
}
