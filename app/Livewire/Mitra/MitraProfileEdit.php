<?php

namespace App\Livewire\Mitra;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Mitra;
use Illuminate\Support\Facades\Auth;

class MitraProfileEdit extends Component
{
    use WithFileUploads;

    public $nama_mitra, $nama_pt, $email, $no_telepon, $alamat, $deskripsi, $foto;

    public function mount()
    {
        // Ambil data mitra yang login
        $mitra = Auth::user()->mitra;

        // Pastikan mitra ditemukan
        if ($mitra) {
            $this->nama_mitra = $mitra->nama;
            $this->nama_pt = $mitra->nama_pt;
            $this->email = $mitra->email;
            $this->no_telepon = $mitra->no_telp;
            $this->alamat = $mitra->alamat;
            $this->deskripsi = $mitra->deskripsi;
        } else {
            // Tindakan jika tidak ada mitra yang terkait, bisa redirect atau set pesan error
            session()->flash('error', 'Mitra tidak ditemukan!');
            return redirect()->route('profil-mitra'); // ganti dengan route yang sesuai
        }
    }

    public function updatedFoto()
    {
        // Validasi foto, misalnya harus berupa gambar dan maksimal 10MB
        $this->validate([
            'foto' => 'image|max:10240', // 10MB Maksimal
        ]);
    }

    public function update()
    {
        // Dapatkan data mitra
        $mitra = Auth::user()->mitra;

        // Pastikan mitra ditemukan sebelum update
        if ($mitra) {
            // Validasi input
            $this->validate([
                'nama_mitra' => 'required',
                'nama_pt' => 'required',
                'email' => 'required|email',
                'no_telepon' => 'required',
                'alamat' => 'required',
                'deskripsi' => 'nullable',
            ]);

            // Update data mitra
            $mitra->update([
                'nama_mitra' => $this->nama_mitra,
                'nama_pt' => $this->nama_pt,
                'email' => $this->email,
                'no_telepon' => $this->no_telepon,
                'alamat' => $this->alamat,
                'deskripsi' => $this->deskripsi,
            ]);

            // Simpan foto jika ada
            if ($this->foto) {
                $path = $this->foto->store('mitra-photos', 'public');
                $mitra->update(['foto' => $path]);
            }

            // Flash message atau redirect setelah sukses update
            session()->flash('message', 'Profil berhasil diperbarui!');
        } else {
            session()->flash('error', 'Mitra tidak ditemukan!');
        }
    }

    public function render()
    {
        // Cek apakah pengguna memiliki peran 'mitra'
        if (Auth::user() && Auth::user()->hasRole('mitra')) {
            return view('livewire..mitra.mitra-profile-edit')->layout('components.layouts.mitra');
        }
    }
}
