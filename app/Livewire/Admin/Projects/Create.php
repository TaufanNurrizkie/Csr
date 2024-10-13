<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use App\Models\Sektor;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
    public $judul;
    public $lokasi;
    public $sektor_id; // Menyimpan ID sektor
    public $tgl_mulai;
    public $tgl_akhir;
    public $status = 'Draft'; // Set default status menjadi 'Draft'

    protected $rules = [
        'judul' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'sektor_id' => 'required|exists:sektors,id', // Validasi sektor
        'tgl_mulai' => 'required|date',
        'tgl_akhir' => 'required|date|after_or_equal:tgl_mulai',
        // 'status' => 'required|in:Draft,Terbit', // Hapus dari sini
    ];

    public function store()
    {
        $this->validate();

        // Simpan data proyek baru
        $project = new Project();
        $project->judul = $this->judul;
        $project->lokasi = $this->lokasi;
        $project->sektor_id = $this->sektor_id; // Simpan sektor
        $project->tgl_mulai = $this->tgl_mulai;
        $project->tgl_akhir = $this->tgl_akhir;
        $project->tgl_diterbitkai = $this->status === 'Terbit' ? now() : null;
        $project->status = $this->status; // Menggunakan status default
        $project->save();

        $this->dispatch('sweet-alert', icon: 'success', title: 'Data berhasil disimpan');

        return redirect()->route('projects.index');
    }

    public function render()
    {
        return view('livewire.admin.projects.create', [
            'sektors' => Sektor::all(), // Ambil semua sektor
        ]);
    }
}
