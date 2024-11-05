<?php

namespace App\Livewire\Mitra;

use App\Models\Mitra;
use App\Models\Project;
use App\Models\Report;
use App\Models\Sektor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateLaporan extends Component
{
    use WithFileUploads;

    public $title, $realisasi, $deskripsi;
    public $status = 'pending', $suggestion, $sektor_id, $project_id;
    public $foto = [];
    public $maxYear;
    public $tanggal, $bulan, $tahun;
    public $lokasi;
    public $mitra;

    public function mount()
    {
        $this->maxYear = date('Y'); // Dapatkan tahun saat ini

        $user = Auth::user();
        $mitra = $user->mitra; // Ambil profil mitra yang terkait dengan pengguna

        if ($mitra) {
            $this->lokasi = $mitra->alamat; // Set lokasi berdasarkan kolom alamat di mitra
            $this->mitra = $mitra->nama; // Set nama mitra dari kolom `nama`
        } else {
            session()->flash('error', 'Mitra tidak ditemukan. Pastikan Anda memiliki data mitra.');
        }
    }

    // Fungsi submit untuk menyimpan laporan
    public function submit()
    {
        // Aturan validasi
        $this->validate([
            'title' => 'required|string|max:255',
            'realisasi' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|integer|min:1|max:31',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:1900|max:' . $this->maxYear,
            'status' => 'in:pending,approved,rejected',
            'suggestion' => 'nullable|string',
            'sektor_id' => 'nullable|exists:sektors,id',
            'project_id' => 'nullable|exists:projects,id',
            'foto.*' => 'nullable|image|max:1024', // Pastikan ini sesuai
        ]);

        // Gabungkan tanggal, bulan, dan tahun menjadi format Y-m-d
        $tgl_realisasi = sprintf('%04d-%02d-%02d', $this->tahun, $this->bulan, $this->tanggal);

        $user = Auth::user();
        $mitra = $user->mitra;

        if (!$mitra) {
            session()->flash('error', 'Mitra tidak ditemukan. Pastikan Anda memiliki data mitra.');
            return;
        }

        $user_id = $user->id;

        // Menyimpan gambar dan mengumpulkan URL
        $uploadedPhotos = [];
        if (!empty($this->foto)) {
            foreach ($this->foto as $photo) {
                // Pastikan setiap foto disimpan dengan unik
                $uploadedPhotos[] = $photo->store('reports', 'public');
            }
        }

        // Simpan laporan ke database
        Report::create([
            'title' => $this->title,
            'mitra_id' => $mitra->id,
            'user_id' => $user_id,
            'nama_mitra' => $this->mitra,
            'lokasi' => $this->lokasi,
            'realisasi' => $this->realisasi,
            'deskripsi' => $this->deskripsi,
            'tgl_realisasi' => $tgl_realisasi,
            'laporan_dikirim' => now(),
            'status' => $this->status,
            'suggestion' => $this->suggestion,
            'sektor_id' => $this->sektor_id,
            'project_id' => $this->project_id,
            'foto' => json_encode($uploadedPhotos), // Menyimpan URL gambar dalam format JSON
        ]);

        session()->flash('message', 'Laporan berhasil disimpan.');
        $this->resetForm();
    }

    // Fungsi reset form
    public function resetForm()
    {
        $this->title = '';
        $this->realisasi = '';
        $this->deskripsi = '';
        $this->tanggal = '';
        $this->bulan = '';
        $this->tahun = '';
        $this->status = 'pending';
        $this->suggestion = '';
        $this->sektor_id = '';
        $this->project_id = '';
        $this->foto = []; // Reset foto yang diupload
    }

    public function removeImage($index)
    {
        unset($this->foto[$index]);
        $this->foto = array_values($this->foto); // Mengatur ulang indeks array
    }


    public function render()
    {
        $mitra = Mitra::where('user_id', Auth::id())->first();

        if (Auth::user() && Auth::user()->hasRole('mitra')) {
            return view('livewire.mitra.create-laporan', [
                'mitra' => $mitra,
                'sektors' => Sektor::all(),
                'projects' => Project::all(),
            ])->layout('components.layouts.mitra');
        }

        return abort(403);
    }
}
