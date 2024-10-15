<?php

namespace App\Livewire\admin\Sektor;

use Livewire\Component;
use App\Models\Sektor;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            return view('livewire.admin.sektor.show')->layout('components.layouts.admin');
        }
    }
}
