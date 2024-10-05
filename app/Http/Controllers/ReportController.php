<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReportController extends Controller
{
    // Tampilkan semua laporan untuk admin
    public function index()
    {
        $reports = Report::all();
        return view('admin.reports.index', compact('reports'));
    }

    // Tampilkan detail laporan
    public function show($id)
    {
        try {
            $report = Report::findOrFail($id);
            return view('admin.reports.show', compact('report'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('reports.index')->with('error', 'Laporan tidak ditemukan.');
        }
    }

    // Proses persetujuan laporan
    public function approve($id)
    {
        try {
            $report = Report::findOrFail($id);
            $report->status = 'approved';
            $report->reviewed_by = auth()->user()->id; // ID admin yang menyetujui laporan
            $report->save();

            return redirect()->back()->with('success', 'Laporan telah disetujui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }
    }

    // Proses penolakan laporan
    public function reject(Request $request, $id)
    {
        try {
            $report = Report::findOrFail($id);
            $report->status = 'rejected';
            $report->review_notes = $request->input('review_notes');
            $report->reviewed_by = auth()->user()->id;
            $report->save();

            return redirect()->back()->with('success', 'Laporan telah ditolak.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }
    }
}
