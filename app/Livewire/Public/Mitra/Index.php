<?php

namespace App\Livewire\Public\Mitra;

use App\Models\Mitra;
use Livewire\Component;
use App\Models\Mitras;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{

    public $mitras;
    public $search = '';

    public function mount()
    {
        // Ambil semua data kegiatan dari database
        $this->mitras = Mitra::latest()->get();
    }

    public function updatedSearch($value)
    {
        // Filter proyek berdasarkan input pencarian
        $this->mitras = Mitra::where('nama', 'like', "%{$value}%") // Ganti 'name' dengan kolom yang sesuai di tabel proyek
            ->get();
    }

    public function render()
    {
        // Check if the user is authenticated and has the 'public' role
            // Render the mitra index view with the public layout
            return view('livewire.public.mitra.index')->layout('components.layouts.public');

        // Redirect or show a fallback view if the user doesn't have access
 // Redirect to login if not authenticated
    }
}
