<?php

namespace App\Livewire\Public\Laporan;


use App\Models\Report;
use Livewire\Component;

class Show extends Component
{
    public $laporan;

    public function mount($id)
    {
        // Ambil laporan berdasarkan ID yang diterima
        $this->laporan = Report::findOrFail($id);
        $this->laporan = Report::with('sektor')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.public.laporan.show', [
            'laporan' => $this->laporan,
        ])->layout('components.layouts.public');
    }
}
