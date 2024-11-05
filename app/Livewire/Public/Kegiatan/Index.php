<?php

namespace App\Livewire\Public\Kegiatan;

use App\Models\Activity;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $sortBy = 'desc'; // Default ke Terbaru

    public function updatedSearch()
    {
        // Trigger re-render ketika search diperbarui
        $this->resetPage(); // Jika menggunakan pagination, reset ke halaman pertama
    }

    public function updatedSortBy()
    {
        // Trigger re-render ketika sortBy diperbarui
        $this->resetPage();
    }

    public function render()
    {
        // Query kegiatan berdasarkan search dan sortBy
        $kegiatan = Activity::query()
            ->when($this->search, function($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->orderBy('published_date', $this->sortBy)
            ->take(8) // Batasi hasil ke 8 item
            ->get();

        return view('livewire.public.kegiatan.index', ['kegiatan' => $kegiatan])
            ->layout('components.layouts.public');
    }
}
