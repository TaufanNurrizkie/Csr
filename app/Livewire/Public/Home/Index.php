<?php

namespace App\Livewire\Public\Home;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.public.home.index')->layout('components.layouts.public');
    }
}
