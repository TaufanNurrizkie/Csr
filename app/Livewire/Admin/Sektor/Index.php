<?php

namespace App\Livewire\admin\Sektor;

use Livewire\Component;
use App\Models\Sektor;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Mengambil data sektor dan melakukan pencarian berdasarkan nama
        $sektor = Sektor::where('nama', 'like', '%' . $this->search . '%')->paginate(10);

        if(Auth::user() && Auth::user()->hasRole('admin')) {
            return view('livewire.admin.sektor.index', [
                'sektor' => $sektor
            ])->layout('components.layouts.admin');
        }

    }
}
