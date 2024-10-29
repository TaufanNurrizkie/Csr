<?php

namespace App\Livewire\Public\Tentang;

use App\Models\Report;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function render()
    {
        $reports = Report::take(3)->get();
        return view('livewire.public.tentang.index', [
            'reports' => $reports
        ])->layout('components.layouts.public');
    }
}
