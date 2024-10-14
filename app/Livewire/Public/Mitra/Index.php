<?php

namespace App\Livewire\Public\Mitra;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function render()
    {
        if(Auth::user() && Auth::user()->hasRole('public')) {
            return view('livewire.public.mitra.index')->layout('components.layouts.public');
        }
    }
}
