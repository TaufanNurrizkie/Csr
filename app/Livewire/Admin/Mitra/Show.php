<?php

namespace App\Livewire\Admin\Mitra;

use App\Models\Mitra;
use Livewire\Component;

class Show extends Component
{

    public $mitra;

    public function mount($id)
    {
        // Mengambil data mitra berdasarkan ID
        $this->mitra = Mitra::findOrFail($id);
    }
    
    public function render()
    {
        return view('livewire.admin.mitra.show');
    }
}
