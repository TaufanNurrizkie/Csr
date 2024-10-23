<?php

namespace App\Livewire\Mitra;

use App\Models\Mitra;
use App\Models\Project;
use App\Models\Report;
use App\Models\Sektor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads; // Import trait

class CreateLaporan extends Component
{
    use WithFileUploads; // Terapkan trait untuk menangani file upload

    public $title, $lokasi, $realisasi, $deskripsi;
    public $status = 'pending', $suggestion, $sektor_id, $project_id;
    public $image_url = [];
    public $uploadImages = []; // Properti untuk menampung file yang di-upload
    public $maxYear;
    public $tanggal, $bulan, $tahun;

    public function mount()
    {
        $this->maxYear = date('Y'); // Dapatkan tahun saat ini
    }

    // Fungsi submit untuk menyimpan laporan
    public function submit()
    {
        // Aturan validasi
        $this->validate([
            'title' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'realisasi' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|integer|min:1|max:31',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:1900|max:' . $this->maxYear,
            'status' => 'in:pending,approved,rejected',
            'suggestion' => 'nullable|string',
            'sektor_id' => 'nullable|exists:sektors,id',
            'project_id' => 'nullable|exists:projects,id',
            'uploadImages.*' => 'nullable|image|max:1024',
        ]);

        // Gabungkan tanggal, bulan, dan tahun menjadi format Y-m-d
        $tgl_realisasi = sprintf('%04d-%02d-%02d', $this->tahun, $this->bulan, $this->tanggal);

        // Ambil mitra_id dari pengguna yang login (gunakan optional untuk menghindari error)
        $mitra_id = optional(Auth::user()->mitra)->id;

        // Simpan laporan ke database
        Report::create([
            'title' => $this->title,
            'mitra_id' => $mitra_id, // Masukkan mitra_id
            'lokasi' => $this->lokasi,
            'realisasi' => $this->realisasi,
            'deskripsi' => $this->deskripsi,
            'tgl_realisasi' => $tgl_realisasi,
            'laporan_dikirim' => now(),
            'status' => $this->status,
            'suggestion' => $this->suggestion,
            'sektor_id' => $this->sektor_id,
            'project_id' => $this->project_id,
        ]);

        session()->flash('message', 'Laporan berhasil disimpan.');
        $this->resetForm(); // Reset form setelah submit
    }


    // Fungsi reset form
    public function resetForm()
    {
        $this->title = '';
        $this->lokasi = '';
        $this->realisasi = '';
        $this->deskripsi = '';
        $this->tanggal = '';
        $this->bulan = '';
        $this->tahun = '';
        $this->status = 'pending';
        $this->suggestion = '';
        $this->sektor_id = '';
        $this->project_id = '';
        $this->uploadImages = []; // Reset gambar upload
    }

    public function render()
    {
           // Mendapatkan mitra berdasarkan user yang sedang login
            $mitra = Mitra::where('user_id', Auth::id())->first();

        if (Auth::user() && Auth::user()->hasRole('mitra')) {
            return view('livewire.mitra.create-laporan', [
                'mitra' => $mitra,
                'sektors' => Sektor::all(),
                'projects' => Project::all(),
            ])->layout('components.layouts.mitra');
        }

        return abort(403); // Akses ditolak jika bukan mitra
    }
}
