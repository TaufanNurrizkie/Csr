<?php

namespace App\Livewire\Mitra;

use App\Models\Mitra;
use App\Models\Project;
use App\Models\Report;
use App\Models\Sektor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditLaporan extends Component
{
    use WithFileUploads;

    public $title, $sektor_id, $project_id, $tanggal, $bulan, $tahun, $realisasi, $deskripsi, $foto = [];
    public $existingImages = [];
    public $reportId;
    public $maxYear;

    protected $rules = [
        'title' => 'required|string|max:255',
        'sektor_id' => 'required|exists:sektors,id',
        'project_id' => 'nullable|exists:projects,id',
        'tanggal' => 'required|integer|min:1|max:31',
        'bulan' => 'required|integer|min:1|max:12',
        'tahun' => 'required|integer|min:2000', // Removed max here
        'realisasi' => 'required|numeric',
        'deskripsi' => 'nullable|string',
        'foto.*' => 'nullable|image|max:1024', // Maks ukuran 1MB
    ];

    public function mount($id)
    {
        // Set the maximum year dynamically
        $this->maxYear = date('Y');
        // Add max validation for year dynamically
        $this->rules['tahun'] .= '|max:' . $this->maxYear;

        // Ambil laporan, atau gagal jika tidak ditemukan
        $report = Report::findOrFail($id);
        $this->reportId = $report->id;
        $this->title = $report->title;
        $this->realisasi = $report->realisasi;
        $this->deskripsi = $report->deskripsi;
        $this->sektor_id = $report->sektor_id;
        $this->project_id = $report->project_id;
        $this->existingImages = json_decode($report->foto, true) ?? [];

        // Pisahkan tanggal menjadi hari, bulan, dan tahun untuk formulir
        $date = explode('-', $report->tgl_realisasi);
        $this->tahun = $date[0];
        $this->bulan = $date[1];
        $this->tanggal = $date[2];
    }

    public function update()
    {
        // Validasi input
        $this->validate();

        // Format tanggal untuk penyimpanan
        $tgl_realisasi = sprintf('%04d-%02d-%02d', $this->tahun, $this->bulan, $this->tanggal);

        // Cek keberadaan laporan
        $report = Report::find($this->reportId);
        if (!$report) {
            session()->flash('error', 'Laporan tidak ditemukan.');
            return redirect()->route('mitra.laporan.index');
        }

        // Simpan foto yang diunggah
        $uploadedPhotos = $this->existingImages;
        if (!empty($this->foto)) {
            foreach ($this->foto as $photo) {
                $uploadedPhotos[] = $photo->store('reports', 'public');
            }
        }

        // Perbarui laporan dengan data baru
        $report->update([
            'title' => $this->title,
            'realisasi' => $this->realisasi,
            'deskripsi' => $this->deskripsi,
            'tgl_realisasi' => $tgl_realisasi,
            'sektor_id' => $this->sektor_id,
            'project_id' => $this->project_id,
            'foto' => json_encode($uploadedPhotos),
        ]);

        // Redirect ke halaman daftar laporan
        return redirect()->route('mitra.dashboard')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function saveDraft()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $tgl_realisasi = sprintf('%04d-%02d-%02d', $this->tahun, $this->bulan, $this->tanggal);

        $report = Report::findOrFail($this->reportId);
        $report->update([
            'title' => $this->title,
            'deskripsi' => $this->deskripsi,
            'tgl_realisasi' => $tgl_realisasi,
            'status' => 'draft',
            'sektor_id' => $this->sektor_id,
            'project_id' => $this->project_id,
        ]);

        return redirect()->route('mitra.laporan');
    }

    public function removeExistingImage($index)
    {
        if (isset($this->existingImages[$index])) {
            Storage::disk('public')->delete($this->existingImages[$index]);
            unset($this->existingImages[$index]);
            $this->existingImages = array_values($this->existingImages);
        }
    }

    public function removeImage($index)
    {
        if (isset($this->foto[$index])) {
            unset($this->foto[$index]);
            $this->foto = array_values($this->foto);
        }
    }

    public function render()
    {
        return view('livewire.mitra.detail-laporan', [
            'sektors' => Sektor::all(),
            'projects' => Project::all(),
        ])->layout('components.layouts.mitra');
    }
}
