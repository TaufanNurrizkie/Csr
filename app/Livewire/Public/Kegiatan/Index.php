<?php

namespace App\Livewire\Public\Kegiatan;

use App\Models\Activity;
use Livewire\Component;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Auth;
class Index extends Component
{
    public $kegiatan;

    public function mount()
    {
        // Ambil semua data kegiatan dari database
        $this->kegiatan = Activity::latest()->get();
    }


    public function render()
    {
        if(Auth::user() && Auth::user()->hasRole('public')) {
            return view('livewire.public.kegiatan.index')->layout('components.layouts.public');
        }
    }
}
