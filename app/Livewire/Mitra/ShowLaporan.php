<?php

namespace App\Livewire\Mitra;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowLaporan extends Component
{
    public $id;
    public $laporan;

    public function mount($id)
    {
        $this->id = $id;
        // Logic untuk mendapatkan data laporan berdasarkan $id

        $this->laporan = Report::with(['sektor', 'project'])->findOrFail($id);
    }

    public function render()
    {
        if (Auth::user() && Auth::user()->hasRole('mitra')) {
            return view('livewire.mitra.show-laporan', [
                'foto' => $this->laporan->foto ?? null, // Pass foto ke view
                'laporan' => $this->laporan,
            ])->layout('components.layouts.mitra');
        }
    }
}
