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

    public function nonaktifkan($id)
{
    $mitra = Mitra::find($id);
    $mitra->status = 'Non-Aktif';
    $mitra->save();

    return view('livewire.admin.mitra.show');
}

public function aktifkan($id)
{
    $mitra = Mitra::findOrFail($id);
    $mitra->status = 'Aktif'; // Ubah status menjadi Aktif
    $mitra->save();

    return view('livewire.admin.mitra.show');
}
    
    public function render()
    {
        return view('livewire.admin.mitra.show');
    }

    
}
