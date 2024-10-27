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

        $this->laporan = Report::with(['sektor', 'project', 'mitra'])->findOrFail($id);
    }


    public function render()
    {
        return view('livewire.public.laporan.show', [
            'laporan' => $this->laporan,
            'foto' => $this->laporan->foto,
        ])->layout('components.layouts.public');
    }
}
