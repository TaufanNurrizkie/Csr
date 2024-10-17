<?php

namespace App\Livewire\Public\Pengajuan;

use Livewire\Component;
use App\Models\Pengajuan; // Impor model Pengajuan

class Show extends Component
{
    public $pengajuan; // Properti publik untuk menyimpan pengajuan yang dipilih
    public $id; // Properti publik untuk ID pengajuan yang dipilih

    public function mount($id)
    {
        // Ambil pengajuan berdasarkan ID yang diberikan
        $this->pengajuan = Pengajuan::find($id);

        // Jika pengajuan tidak ditemukan, Anda bisa mengalihkan atau menampilkan pesan kesalahan
        if (!$this->pengajuan) {
            session()->flash('error', 'Pengajuan tidak ditemukan.');
            return redirect()->route('route.name'); // Ganti dengan rute yang sesuai
        }
    }

    public function render()
    {
        return view('livewire.public.pengajuan.show')->layout('components.layouts.admin');
    }
}
