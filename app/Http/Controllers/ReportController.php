<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReportController extends Controller
{
    // Tampilkan semua laporan untuk admin dengan pencarian
    public function index(Request $request)
    {
        // Ambil kata kunci pencarian dari query string
        $search = $request->input('search');

        // Filter laporan berdasarkan judul atau nama pelapor jika ada kata kunci pencarian
        $reports = Report::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('reporter_name', 'like', '%' . $search . '%');
        })->paginate(5); // Menggunakan pagination

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
            $report->reviewed_by = auth()->user()->id; // ID admin yang menolak laporan
            $report->save();

            return redirect()->back()->with('success', 'Laporan telah ditolak.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }
    }

    // Tambahkan saran
    public function suggest(Request $request, $id)
    {
        try {
            $report = Report::findOrFail($id);
            $report->suggestion = $request->input('suggestion');
            $report->save();

            return redirect()->route('reports.show', $report->id)->with('success', 'Saran telah disampaikan.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('reports.index')->with('error', 'Laporan tidak ditemukan.');
        }
    }

    // Simpan laporan baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
            // Kolom lainnya...
        ]);

        // Menyimpan gambar
        $imagePath = $request->file('image')->store('reports', 'public'); // Simpan di storage/app/public/reports

        // Membuat laporan
        Report::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $imagePath, // Simpan URL gambar
            'submitted_by' => auth()->user()->id,
            'reporter_name' => $request->reporter_name,
            // Kolom lainnya...
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dibuat.');
    }

    function download_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $reports = Report::paginate(5);
        $mpdf->WriteHTML(view('livewire.admin.reports.pdf', compact('reports')));
        $mpdf->Output('Data-Laporan-CSR.pdf','D');
    }
    function download_csv()
    {
        $data = Report::latest()->get();
        $filename = "Data-Laporan-CSR.csv";
        $fp=fopen($filename, "w+");
        fputcsv($fp, array('id', 'Judul Laporan','Mitra', 'Lokasi', 'Realisasi','Deskripsi', 'Tgl_realisasi', 'Laporan Dikirim', 'status'));
        
        foreach($data as $row){
            fputcsv($fp, array($row->id,$row->title,$row->mitra,$row->lokasi,$row->realisasi,$row->deskripsi,$row->tgl_realisasi, $row->laporan_dikirim,$row->status));
        }

        fclose($fp);
        $headers = array('Content-Type' => 'text/csv');

        return response()->download($filename, "Data-Laporan-CSR.csv", $headers);
    }
}

