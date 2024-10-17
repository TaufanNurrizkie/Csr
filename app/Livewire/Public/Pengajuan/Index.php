<?php

namespace App\Livewire\Public\Pengajuan;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.public.pengajuan.index')->layout('components.layouts.public');
    }
}
