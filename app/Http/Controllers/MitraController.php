<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel mitras
        $mitras = Mitra::paginate(5);

        // Mengirim data mitras ke view
        return view('admin.mitra.index', compact('mitras'));
    }
    public function show($id)
    {
    // Mengambil data mitra berdasarkan ID
    $mitra = Mitra::findOrFail($id);

    // Mengirim data ke view
    return view('admin.mitra.show', compact('mitra'));
    }
    public function create()
    {
        return view('admin.mitra.create'); // Pastikan view ini ada
    }
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:255',
            'nama_pt' => 'required|string|max:255',
            'email' => 'nullable|email',
            'no_telp' => 'nullable|numeric',
            'alamat' => 'nullable|string|max:500',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:Aktif,Non-Aktif',
        ]);

        // Proses penyimpanan data mitra
        $mitra = new Mitra();
        $mitra->foto = $request->file('foto')->store('uploads', 'public'); // Simpan foto
        $mitra->nama = $request->nama;
        $mitra->nama_pt = $request->nama_pt;
        $mitra->email = $request->email;
        $mitra->no_telp = $request->no_telp;
        $mitra->alamat = $request->alamat;
        $mitra->deskripsi = $request->deskripsi;
        $mitra->tgl_terdaftar = $request->status === 'Aktif' ? now() : null;
        $mitra->status = $request->status;
        $mitra->save();

        return redirect()->route('mitra.index')->with('success', 'Mitra berhasil ditambahkan!');
    }

    public function edit($id)
{
    $mitra = Mitra::findOrFail($id);
    return view('admin.mitra.edit', compact('mitra'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'nama_pt' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'no_telp' => 'required|string|max:15', // Sesuaikan dengan panjang maksimum no_telp
        'alamat' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ukuran maksimum file 2MB
    ]);

    $mitra = Mitra::findOrFail($id);
    $mitra->nama = $request->nama;
    $mitra->nama_pt = $request->nama_pt;
    $mitra->email = $request->email;
    $mitra->no_telp = $request->no_telp;
    $mitra->alamat = $request->alamat;
    $mitra->deskripsi = $request->deskripsi;

    // Handle foto upload
    if ($request->hasFile('foto')) {
        $filePath = $request->file('foto')->store('mitra', 'public');
        $mitra->foto = $filePath;
    }

    $mitra->save();

    return redirect()->route('mitra.index')->with('success', 'Mitra berhasil diperbarui!');
}

public function nonaktifkan($id)
{
    $mitra = Mitra::find($id);
    $mitra->status = 'Non-Aktif';
    $mitra->save();

    return redirect()->route('mitra.index')->with('success', 'Mitra berhasil dinonaktifkan');
}

public function aktifkan($id)
{
    $mitra = Mitra::findOrFail($id);
    $mitra->status = 'Aktif'; // Ubah status menjadi Aktif
    $mitra->save();

    return redirect()->route('mitra.index')->with('success', 'Mitra berhasil diaktifkan.');
}



}