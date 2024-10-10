<?php

namespace App\Livewire\Admin\Mitra;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mitra;


class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        // Ambil data mitra berdasarkan pencarian
        $mitras = Mitra::when($this->search, function ($query) {
            return $query->where('nama', 'like', '%' . $this->search . '%')
                         ->orWhere('nama_pt', 'like', '%' . $this->search . '%');
        })->paginate(5);

        return view('livewire.admin.mitra.index', compact('mitras'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
