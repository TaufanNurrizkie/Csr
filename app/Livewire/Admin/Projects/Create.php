<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
    public $judul;
    public $lokasi;
    public $jumlah_mitra;
    public $tgl_mulai;
    public $tgl_akhir;
    public $tgl_diterbitkan;
    public $status;

    protected $rules = [
        'judul' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'jumlah_mitra' => 'required|integer|min:1',
        'tgl_mulai' => 'required|date',
        'tgl_akhir' => 'required|date|after_or_equal:tgl_mulai',
        'tgl_diterbitkan' => 'required|date',
        'status' => 'required|in:Draft,Terbit',
    ];

    public function store()
    {
        $this->validate();

        // Simpan data proyek baru
        $project = new Project();
        $project->judul = $this->judul;
        $project->lokasi = $this->lokasi;
        $project->jumlah_mitra = $this->jumlah_mitra;
        $project->tgl_mulai = $this->tgl_mulai;
        $project->tgl_akhir = $this->tgl_akhir;
        $project->tgl_diterbitkai = $this->tgl_diterbitkan; // Perbaiki typo dari 'tgl_diterbitkai'
        $project->status = $this->status;
        $project->save();

        // Emit event atau redirect
        session()->flash('success', 'Proyek berhasil dibuat.');
        return redirect()->route('projects.index');
    }



    public function render()
    {
        return view('livewire.admin.projects.create');
    }
}
