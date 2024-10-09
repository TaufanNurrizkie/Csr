<?php

namespace App\Livewire\Admin\Mitra;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Mitra;

class Edit extends Component
{
    use WithFileUploads;

    public $mitra;
    public $nama, $nama_pt, $email, $no_telp, $alamat, $deskripsi, $foto;

    public function mount($id)
    {
        $this->mitra = Mitra::findOrFail($id);
        $this->nama = $this->mitra->nama;
        $this->nama_pt = $this->mitra->nama_pt;
        $this->email = $this->mitra->email;
        $this->no_telp = $this->mitra->no_telp;
        $this->alamat = $this->mitra->alamat;
        $this->deskripsi = $this->mitra->deskripsi;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'nama_pt' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->mitra->nama = $this->nama;
        $this->mitra->nama_pt = $this->nama_pt;
        $this->mitra->email = $this->email;
        $this->mitra->no_telp = $this->no_telp;
        $this->mitra->alamat = $this->alamat;
        $this->mitra->deskripsi = $this->deskripsi;

        if ($this->foto) {
            // Menyimpan foto baru dan menghapus foto lama jika ada
            $this->mitra->foto = $this->foto->store('mitra', 'public');
        }

        $this->mitra->save();

        session()->flash('success', 'Mitra berhasil diperbarui!');
        return redirect()->route('mitra.index');
    }

    public function render()
    {
        return view('livewire.admin.mitra.edit');
    }
}
