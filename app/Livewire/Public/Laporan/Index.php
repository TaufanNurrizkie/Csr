<?php

namespace App\Livewire\Public\Laporan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Report;
use App\Models\Mitra;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 8;
    public $selectedMitra = ''; // Tambahkan properti mitra_id untuk filter

    protected $updatesQueryString = ['search', 'mitra_id', 'perPage'];

    public function loadMore()
    {
        $this->perPage += 8;
    }

    public function render()
    {

        // Query laporan dengan filter mitra_id dan pencarian
        $laporans = Report::when($this->selectedMitra, function ($query) {
            $query->where('mitra_id', $this->selectedMitra);
        })
        ->when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        })
        ->get();

        $mitras = Mitra::all(); // Mengambil daftar mitra untuk dropdown

        return view('livewire.public.laporan.index', [
            'laporans' => $laporans,
            'mitras' => $mitras,
        ])->layout('components.layouts.public');

    }
}
