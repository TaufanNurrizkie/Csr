<?php

namespace App\Livewire\Public\Semuakegiatan;

use App\Models\Activity;
use Livewire\Component;

class Index extends Component
{
    public $kegiatan;

    public function mount()
    {
        // Ambil semua data kegiatan dari database
        $this->kegiatan = Activity::take(99)->get();
    }

    public function render()
    {
        // Menggunakan layout component.layouts.public
        return view('livewire.public.semuakegiatan.index')
            ->layout('components.layouts.public'); // Menambahkan layout
    }
}
