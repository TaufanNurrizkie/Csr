<?php

namespace App\Livewire\admin\Sektor;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Sektor;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $thumbnail;
    public $nama;
    public $deskripsi;
    public $thumbnailUrl;

    public $sektorId;

    public function mount($id)
    {
        // Ambil data sektor berdasarkan ID
        $sektor = Sektor::findOrFail($id);
        
        // Inisialisasi properti
        $this->sektorId = $sektor->id;
        $this->nama = $sektor->nama;
        $this->deskripsi = $sektor->deskripsi;
        $this->thumbnailUrl = asset('storage/' . $sektor->thumbnail); // Simpan URL gambar yang ada
    }

    public function update()
    {
        $validatedData = $this->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $sektor = Sektor::findOrFail($this->sektorId);

        // Jika ada gambar baru yang diunggah
        if ($this->thumbnail) {
            // Hapus gambar lama jika ada
            if ($sektor->thumbnail) {
                Storage::disk('public')->delete($sektor->thumbnail);
            }
            // Simpan gambar baru
            $thumbnailPath = $this->thumbnail->store('thumbnails', 'public');
            $validatedData['thumbnail'] = $thumbnailPath; // Update path gambar
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $validatedData['thumbnail'] = $sektor->thumbnail;
        }

        // Update data sektor
        $sektor->update($validatedData);

        session()->flash('success', 'Sektor berhasil diupdate');
        return redirect()->route('sektor.index');
    }

    public function delete()
{
    // Menghapus sektor berdasarkan ID
    $sektor = Sektor::findOrFail($this->sektorId); // Gantilah $this->sektorId sesuai dengan bagaimana Anda mendapatkan ID sektor

    // Hapus sektor
    $sektor->delete();

    // Emit event untuk memberitahu bahwa sektor telah dihapus
    session()->flash('success', 'Sektor berhasil dihapus.');
    
    // Redirect kembali ke halaman index
    return redirect()->route('sektor.index');
}


    public function render()
    {
        return view('livewire.admin.sektor.edit');
    }
}