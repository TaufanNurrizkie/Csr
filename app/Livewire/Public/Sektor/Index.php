<?php

namespace App\Livewire\Public\Sektor;

use App\Models\Project;
use App\Models\Sektor;
use Livewire\Component;

class Index extends Component
{
    public $sector = 'Semua Sektor'; // Default value
    public $sektors;
    public $search = ''; // Properti untuk menyimpan input pencarian
    public $projects; // Properti untuk menyimpan proyek yang sesuai pencarian
    public $perPage = 8;

    public function loadMore()
    {
        // Menambah jumlah laporan yang ditampilkan
        $this->perPage += 8;
    }

    public function mount()
    {
        // Ambil semua sektor dari database saat komponen pertama kali dimuat
        $this->sektors = Sektor::all();
        $this->projects = Project::with('sektor')->get(); // Ambil semua proyek awalnya
    }

    public function updatedSearch($value)
    {
        // Filter proyek berdasarkan input pencarian
        $this->projects = Project::with('sektor')
            ->where('judul', 'like', "%{$value}%") // Ganti 'name' dengan kolom yang sesuai di tabel proyek
            ->get();
    }

    public function render()
    {
        $sektor = Sektor::withCount('projects')->paginate($this->perPage); // Ambil sektor dengan jumlah proyek

        return view('livewire.public.sektor.index', compact('sektor'))->layout('components.layouts.public');
    }
}
