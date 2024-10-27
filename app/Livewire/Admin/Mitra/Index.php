<?php

namespace App\Livewire\Admin\Mitra;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mitra;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortOrder = 'desc'; 

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setSortOrder($order)
    {
        $this->sortOrder = $order;
    }

    public function render()
    {
        // Ambil data mitra berdasarkan pencarian
        $mitras = Mitra::when($this->search, function ($query) {
            return $query->where('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('nama_pt', 'like', '%' . $this->search . '%');
        })
        ->orderBy('tgl_terdaftar', $this->sortOrder)
        ->paginate(5);

        if(Auth::user() && Auth::user()->hasRole('admin')) {
            return view('livewire.admin.mitra.index', compact('mitras'))->layout('components.layouts.admin');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
