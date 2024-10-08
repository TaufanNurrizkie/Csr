<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

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
        // Validasi data
        $request->validate([
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jumlah_mitra' => 'required|integer',
            'tgl_mulai' => 'required|date',
            'tgl_akhir' => 'required|date',
            'tgl_diterbitkai' => 'required|date',
            'status' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        // Simpan proyek
        $project = new Project();
        $project->judul = $request->judul;
        $project->lokasi = $request->lokasi;
        $project->jumlah_mitra = $request->jumlah_mitra;
        $project->tgl_mulai = $request->tgl_mulai;
        $project->tgl_akhir = $request->tgl_akhir;
        $project->tgl_diterbitkai = $request->tgl_diterbitkai; // Pastikan nama field ini sesuai dengan database
        $project->status = $request->status;
        $project->save();

        // Redirect atau mengembalikan respons
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil disimpan!');
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
        // Contoh:
        $project->judul = $request->judul;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Hapus proyek
    }

    // ProjectController.php
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

