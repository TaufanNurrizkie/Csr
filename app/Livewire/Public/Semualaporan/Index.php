<?php

namespace App\Livewire\Public\Semualaporan;

use Livewire\Component;
use App\Models\Report;

class Index extends Component
{

    public $report;

    public function mount()
    {
        // Ambil semua data kegiatan dari database
        $this->report = Report::take(99)->get();
    }

    public function render()
    {
        return view('livewire.public.semualaporan.index')
            ->layout('components.layouts.public');
    }
}
