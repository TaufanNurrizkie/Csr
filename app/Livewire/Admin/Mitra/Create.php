<?php

namespace App\Livewire\Admin\Mitra;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Mitra;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{

    use WithFileUploads;

    public $foto, $nama, $nama_pt, $email, $no_telp, $alamat, $deskripsi, $status;

    protected $rules = [
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'nama' => 'required|string|max:255',
        'nama_pt' => 'required|string|max:255',
        'email' => 'nullable|email',
        'no_telp' => 'nullable|numeric',
        'alamat' => 'nullable|string|max:500',
        'deskripsi' => 'nullable|string',
        'status' => 'required|in:Aktif,Non-Aktif',
    ];

    public function submit()
    {
        $this->validate();

        // Simpan foto ke storage
        $fotoPath = $this->foto ? $this->foto->store('uploads', 'public') : null;

        // Simpan data ke dalam database
        Mitra::create([
            'foto' => $fotoPath,
            'nama' => $this->nama,
            'nama_pt' => $this->nama_pt,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
            'alamat' => $this->alamat,
            'deskripsi' => $this->deskripsi,
            'tgl_terdaftar' => $this->status === 'Aktif' ? now() : null,
            'status' => $this->status,
        ]);

        // Redirect setelah berhasil simpan
        $this->dispatch('sweet-alert', icon: 'success', title: 'Data berhasil disimpan');

        return redirect()->route('mitra.index');
    }


    public function render()
    {
        return view('livewire.admin.mitra.create');
    }
}
