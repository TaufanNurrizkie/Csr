<?php

namespace App\Livewire\Public\Kegiatan;

use App\Models\Activity;
use Livewire\Component;
use App\Models\Kegiatan;
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
        return view('livewire.public.kegiatan.index');
    }
}
