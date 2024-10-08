<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sektor;
use Illuminate\Support\Facades\Storage;

class SectorController extends Controller
{
    // Menampilkan halaman sektor
    public function index()
    {
        $sektor = Sektor::paginate(10); // Contoh jika Anda ingin mengambil semua data sektor
        return view('admin.sektor.index', compact('sektor'));
    }

    // Tambah sektor
    public function create()
    {
        return view('admin.sektor.create');
    }

    // Simpan sektor baru
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan gambar
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        // Tambahkan data ke database
        Sektor::create([
            'thumbnail' => $thumbnailPath,
            'nama' => $validatedData['nama'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        return redirect('/sektor')->with('success', 'Sektor berhasil ditambahkan');
    }

    // Menampilkan detail sektor
    public function show($id)
    {
        $sektor = Sektor::findOrFail($id); // Mengambil sektor berdasarkan ID
        return view('admin.sektor.show', compact('sektor')); // Mengirim data ke view
    }


    // Edit sektor
    public function edit($id)
    {
        $sektor = Sektor::findOrFail($id);
        return view('admin.sektor.edit', compact('sektor'));
    }

    // Update sektor
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // Validasi gambar
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $sektor = Sektor::findOrFail($id);

        // Jika ada gambar baru yang diunggah
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($sektor->thumbnail) {
                Storage::disk('public')->delete($sektor->thumbnail);
            }
            // Simpan gambar baru
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validatedData['thumbnail'] = $thumbnailPath; // Update path gambar
        }

        // Update data sektor
        $sektor->update($validatedData);

        return redirect('/sektor')->with('success', 'Sektor berhasil diupdate');
    }

    // Hapus sektor
    public function destroy($id)
    {
        $sektor = Sektor::findOrFail($id);

        // Hapus gambar jika ada
        if ($sektor->thumbnail) {
            Storage::disk('public')->delete($sektor->thumbnail);
        }

        $sektor->delete();

        return redirect('/sektor')->with('success', 'Sektor berhasil dihapus');
    }
}
