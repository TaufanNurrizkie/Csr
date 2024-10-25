<?php

namespace App\Livewire\Mitra;

use App\Models\Mitra;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MitraProfile extends Component
{
    public $mitra;

    public function mount()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $this->mitra = Mitra::where('email', $user->email)->first(); // Ambil data mitra berdasarkan email
    }

    public function render()
    {
        if(Auth::user() && Auth::user()->hasRole('mitra')) {
            return view('livewire..mitra.mitra-profile')->layout('components.layouts.mitra');
        }
    }
}
