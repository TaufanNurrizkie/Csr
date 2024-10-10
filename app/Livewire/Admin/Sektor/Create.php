<?php

namespace App\Livewire\Admin\Sektor;

use App\Models\Sektor;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $thumbnail;
    public $nama;
    public $deskripsi;

    // Metode untuk menyimpan sektor
    public function store()
    {
        $validatedData = $this->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan gambar
        $thumbnailPath = $this->thumbnail->store('thumbnails', 'public');

        // Tambahkan data ke database
        Sektor::create([
            'thumbnail' => $thumbnailPath,
            'nama' => $validatedData['nama'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        // Reset input
        $this->reset();

        // Tampilkan SweetAlert dan lakukan redirect setelah dikonfirmasi
        $this->dispatch('sweet-alert', icon: 'success', title: 'Data berhasil disimpan');

       return redirect()->route('sektor.index');
    }

    public function render()
    {
        return view('livewire.admin.sektor.create');
    }
}
