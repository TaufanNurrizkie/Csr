<?php

namespace App\Livewire\Public\Mitra;

use Livewire\Component;
use App\Models\Mitra; // Import the Mitra model

class Show extends Component
{
    public $mitraId; // Store the Mitra ID (Fixed the name)
    public $mitra;   // Store the fetched Mitra data

    public function mount($id)
{
    // Fetch mitra data by ID
    $this->mitra = Mitra::findOrFail($id);
}


    public function render()
    {
        return view('livewire.public.mitra.show', [
            'mitra' => $this->mitra
        ])->layout('components.layouts.public');
    }
}
