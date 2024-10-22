<?php

namespace App\Livewire\Mitra;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Laporan extends Component
{
    use WithPagination;

    public $search = '';


    public function render()
    {
        $reports = Report::where('title', 'like', '%'.$this->search.'%')
        ->paginate(10); // Adjust the pagination as needed

        if(Auth::user() && Auth::user()->hasRole('mitra')) {
            return view('livewire.mitra.laporan', compact('reports'))->layout('components.layouts.mitra');
        }
    }
}
