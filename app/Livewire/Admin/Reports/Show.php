<?php

namespace App\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Show extends Component
{
    public $reportId;
    public $report;
    public $reviewNotes; // Properti untuk catatan penolakan
    public $suggestion; // Properti untuk saran

    public function mount($id)
    {
        $this->reportId = $id;
        $this->loadReport();
        $this->reviewNotes = ''; // Inisialisasi reviewNotes
        $this->suggestion = ''; // Inisialisasi suggestion
    }

    public function loadReport()
    {
        try {
            $this->report = Report::findOrFail($this->reportId);
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Laporan tidak ditemukan.');
            return redirect()->route('reports.index');
        }
    }

    public function approve()
    {
        $this->report->update(['status' => 'approved']);
        session()->flash('success', 'Laporan berhasil disetujui.');
        return redirect()->route('reports.show', $this->reportId);
    }

    public function reject()
    {
        $this->report->update([
            'status' => 'rejected',
            'review_notes' => $this->reviewNotes, // Ambil dari properti
        ]);
        session()->flash('success', 'Laporan berhasil ditolak.');
        return redirect()->route('reports.show', $this->reportId);
    }

    public function suggest()
    {
        // Implement logic for suggestions
        // Gunakan $this->suggestion jika Anda ingin mengimplementasikan penyimpanan saran.
        session()->flash('success', 'Saran telah dikirim.');
        return redirect()->route('reports.show', $this->reportId);
    }

    public function render()
    {
        return view('livewire.admin.reports.show');
    }
}
