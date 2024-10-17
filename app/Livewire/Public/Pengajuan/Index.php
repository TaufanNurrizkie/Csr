<?php

namespace App\Livewire\Public\Pengajuan;

use App\Models\Mitra;
use App\Models\Project;
use Livewire\Component;
use App\Models\Pengajuan; // Import the Pengajuan model

class Index extends Component
{
    public $programs;
    public $mitras;
    public $nama_lengkap, $tanggal_lahir, $no_handphone, $nama_instansi, $nama_program, $nama_mitra;

    public function mount()
    {
        // Ambil semua data program dan mitra dari database
        $this->programs = Project::all();
        $this->mitras = Mitra::all();
    }

    protected $rules = [
        'nama_lengkap' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'no_handphone' => 'required|string|max:15',
        'nama_instansi' => 'required|string|max:255',
        'nama_program' => 'required|string|max:255',
        'nama_mitra' => 'required|string|max:255',
    ];

    public function submit()
    {
        // Validasi data
        $this->validate();

        // Simpan data ke database
        Pengajuan::create([
            'nama_lengkap' => $this->nama_lengkap,
            'tanggal_lahir' => $this->tanggal_lahir,
            'no_handphone' => $this->no_handphone,
            'nama_instansi' => $this->nama_instansi,
            'nama_program' => $this->nama_program,
            'nama_mitra' => $this->nama_mitra,
        ]);

        // Flash a success message
        session()->flash('message', 'Pengajuan berhasil dikirim!');

        // Reset the form fields after submission
        $this->reset();
    }

    public function render()
    {
        // Render the Livewire view and apply the layout
        return view('livewire.public.pengajuan.index')
            ->layout('components.layouts.public');
    }
}
