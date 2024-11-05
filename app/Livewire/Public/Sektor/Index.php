<?php

namespace App\Livewire\Public\Sektor;

use App\Models\Project;
use App\Models\Sektor;
use Livewire\Component;

class Index extends Component
{
    public $sector = 'Semua Sektor'; // Nilai default untuk sektor yang dipilih
    public $search = ''; // Properti untuk input pencarian
    public $perPage = 8; // Jumlah proyek yang ditampilkan per halaman

    public function loadMore()
    {
        // Menambah jumlah proyek yang ditampilkan
        $this->perPage += 8;
    }

    public function mount()
    {
        // Ambil semua sektor saat komponen pertama kali dimuat
        $this->sektors = Sektor::all();
    }

    public function render()
    {
        // Ambil semua sektor untuk dropdown
        $sektors = Sektor::all();
    
        // Filter proyek berdasarkan sektor dan pencarian
        $projects = Project::with('sektor')
            ->when($this->sector !== 'Semua Sektor', function ($query) {
                $query->where('sektor_id', $this->sector);
            })
            ->when($this->search, function ($query) {
                $query->where('judul', 'like', "%{$this->search}%");
            })
            ->take($this->perPage)
            ->get();
    
        $sektor = Sektor::withCount('projects')->get(); // Ambil sektor dengan jumlah proyek
    
        return view('livewire.public.sektor.index', [
            'sektor' => $sektor,
            'sektors' => $sektors,
            'projects' => $projects,
        ])->layout('components.layouts.public');
    }
    
}
