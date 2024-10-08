<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Tambahkan ini untuk mengimpor Validator

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jumlah_mitra' => 'required|integer|min:1',
            'tgl_mulai' => 'required|date',
            'tgl_akhir' => 'required|date|after_or_equal:tgl_mulai',
            'tgl_diterbitkan' => 'required|date',
            'status' => 'required|in:Draft,Terbit',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data proyek baru
        $project = new Project();
        $project->judul = $request->judul;
        $project->lokasi = $request->lokasi;
        $project->jumlah_mitra = $request->jumlah_mitra;
        $project->tgl_mulai = $request->tgl_mulai;
        $project->tgl_akhir = $request->tgl_akhir;
        $project->tgl_diterbitkai = $request->tgl_diterbitkai;
        $project->status = $request->status;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dibuat.');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        // Validasi dan update proyek yang ada
        $request->validate([
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jumlah_mitra' => 'required|integer|min:1',
            'tgl_mulai' => 'required|date',
            'tgl_akhir' => 'required|date|after_or_equal:tgl_mulai',
            'tgl_diterbitkai' => 'required|date',
            'status' => 'required|in:Draft,Terbit',
        ]);

        $project->judul = $request->judul;
        $project->lokasi = $request->lokasi;
        $project->jumlah_mitra = $request->jumlah_mitra;
        $project->tgl_mulai = $request->tgl_mulai;
        $project->tgl_akhir = $request->tgl_akhir;
        $project->tgl_diterbitkai = $request->tgl_diterbitkai;
        $project->status = $request->status;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Hapus proyek
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus!');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function publish($id)
    {
        $project = Project::findOrFail($id);
        // Logika untuk menerbitkan proyek (misalnya, memperbarui status)
        $project->status = 'Terbit'; // Contoh perubahan status
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diterbitkan!');
    }
}
