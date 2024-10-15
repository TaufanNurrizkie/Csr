<?php

namespace App\Livewire\Public\Kegiatan;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function render()
    {
        if(Auth::user() && Auth::user()->hasRole('public')) {
            return view('livewire.public.kegiatan.index')->layout('components.layouts.public');
        }
    }
}
