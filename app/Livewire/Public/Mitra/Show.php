<?php

namespace App\Livewire\Public\Mitra;

use Livewire\Component;
use App\Models\Mitra;
use App\Models\Report;

class Show extends Component
{
    public $mitraId; // Store the Mitra ID
    public $mitra;   // Store the fetched Mitra data

    public function mount($id)
    {
        // Store mitra ID
        $this->mitraId = $id;

        // Fetch mitra data by ID
        $this->mitra = Mitra::findOrFail($this->mitraId);
    }

    public function render()
    {
        // Fetch reports related to the mitra
        $reports = Report::where('mitra_id', $this->mitraId)->take(3)->get();

        return view('livewire.public.mitra.show', [
            'mitra' => $this->mitra,
            'reports' => $reports,
        ])->layout('components.layouts.public');
    }
}
