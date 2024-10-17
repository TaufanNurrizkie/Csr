<?php

namespace App\Livewire\Public\Kegiatan;

use App\Models\Activity;
use Livewire\Component;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Auth;
class Index extends Component
{
    public $kegiatan;
    public $search = '';

    public function mount()
    {
        // Ambil semua data kegiatan dari database
        $this->kegiatan = Activity::take(8)->get();
    }

    public function updatedSearch($value)
    {
        // Filter proyek berdasarkan input pencarian
        $this->kegiatan = Activity::where('title', 'like', "%{$value}%") // Ganti 'name' dengan kolom yang sesuai di tabel proyek
            ->get();
    }

    public function render()
    {
            return view('livewire.public.kegiatan.index')->layout('components.layouts.public');
    }
}
