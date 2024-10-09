<?php

namespace App\Livewire\admin\Sektor;

use Livewire\Component;
use App\Models\Sektor;

class Show extends Component
{
    public $sektor;

    public function mount($id)
    {
        // Mengambil sektor berdasarkan ID yang diterima
        $this->sektor = Sektor::findOrFail($id);
    }

    public function render()
    {
        // Mengembalikan view dengan data sektor
        return view('livewire.admin.sektor.show');
    }
}
