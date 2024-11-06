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

    public function deleteLaporan()
    {
        if (Auth::user() && Auth::user()->hasRole('mitra')) {
            // Menghapus laporan berdasarkan id
            Report::where('id', $this->id)->delete();

            // Redirect setelah penghapusan atau kirim pesan sukses
            session()->flash('message', 'Laporan berhasil dihapus.');
            return redirect()->route('mitra.dashboard'); // Redirect ke halaman daftar laporan
        }
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
