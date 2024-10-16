<?php

namespace App\Livewire\Public\Mitra;

use App\Models\Mitra;
use Livewire\Component;
use App\Models\Mitras;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{

    public $mitras;

    public function mount()
    {
        // Ambil semua data kegiatan dari database
        $this->mitras = Mitra::latest()->get();
    }

    public function render()
    {
        // Check if the user is authenticated and has the 'public' role
        if(Auth::check() && Auth::user()->hasRole('public')) {
            // Render the mitra index view with the public layout
            return view('livewire.public.mitra.index')->layout('components.layouts.public');
        }

        // Redirect or show a fallback view if the user doesn't have access
        return redirect()->route('login'); // Redirect to login if not authenticated
    }
}
