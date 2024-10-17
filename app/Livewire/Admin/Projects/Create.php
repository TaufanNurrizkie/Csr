<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Project;
use App\Models\Sektor;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    use WithFileUploads;

    public $judul;
    public $lokasi;
    public $sektor_id;
    public $tgl_mulai;
    public $tgl_akhir;
    public $status = 'Draft'; // Default status
    public $photo = []; // Array to store multiple uploaded photos
    public $deskripsi;

    protected $rules = [
        'judul' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'sektor_id' => 'required|exists:sektors,id',
        'tgl_mulai' => 'required|date',
        'tgl_akhir' => 'required|date|after_or_equal:tgl_mulai',
        'photo.*' => 'nullable|image|max:1024', // Validating each uploaded photo (optional)
        'deskripsi' => 'required|string|max:500',
    ];

    public function store()
    {
        $this->validate();

        // Save the new project
        $project = new Project();
        $project->judul = $this->judul;
        $project->lokasi = $this->lokasi;
        $project->sektor_id = $this->sektor_id;
        $project->tgl_mulai = $this->tgl_mulai;
        $project->tgl_akhir = $this->tgl_akhir;
        $project->status = $this->status;
        $project->tgl_diterbitkai = $this->status === 'Terbit' ? now() : null;
        $project->deskripsi = $this->deskripsi;

        // Handle multiple image uploads and store paths
        $uploadedPhotos = [];
        if (!empty($this->photo)) {
            foreach ($this->photo as $photo) {
                $uploadedPhotos[] = $photo->store('projects/photos', 'public');
            }
            $project->photo = json_encode($uploadedPhotos); // Save the image paths as JSON
        }

        $project->save();

        // Dispatch success message
        $this->dispatch('sweet-alert', icon: 'success', title: 'Data berhasil disimpan');

        return redirect()->route('projects.index');
    }

    public function render()
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            return view('livewire.admin.projects.create', [
                'sektors' => Sektor::all(),
            ])->layout('components.layouts.admin');
        }
    }
}
