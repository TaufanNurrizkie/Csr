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
      // Ambil ID pengguna yang sedang login
    $userId = Auth::user()->id;

    // Ambil laporan yang terkait dengan user_id
    $reports = Report::where('user_id', $userId) // Gunakan user_id sebagai filter
        ->where('title', 'like', '%'.$this->search.'%')
        ->paginate(10); // Sesuaikan pagination jika diperlukan

        if(Auth::user() && Auth::user()->hasRole('mitra')) {
            return view('livewire.mitra.laporan', compact('reports'))->layout('components.layouts.mitra');
        }
    }
}
