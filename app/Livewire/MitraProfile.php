<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MitraProfile extends Component
{
    public function render()
    {
        if(Auth::user() && Auth::user()->hasRole('mitra')) {
            return view('livewire.mitra-profile')->layout('components.layouts.mitra');
        }
    }
}
