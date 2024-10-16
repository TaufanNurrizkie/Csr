<?php

namespace App\Livewire\Public\Kegiatan;

use App\Models\Activity;
use Livewire\Component;

class Show extends Component
{
    public $kegiatanId;
    public $kegiatan;

    public function mount($id)
    {
        // Ambil data kegiatan berdasarkan ID
        $this->kegiatanId = $id;
        $this->kegiatan = Activity::findOrFail($this->kegiatanId);
        $this->kegiatan = Activity::latest()->get();
    }

    public function render()
    {
        return view('livewire.public.kegiatan.show', [
            'kegiatan' => $this->kegiatan,
        ])->layout('components.layouts.public');
    }
}
