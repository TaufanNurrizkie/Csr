<?php

namespace App\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Show extends Component
{

    public $reportId;
    public $report;

    public function mount($id)
    {
        $this->reportId = $id;
        $this->loadReport();
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

    public function reject($reviewNotes)
    {
        $this->report->update([
            'status' => 'rejected',
            'review_notes' => $reviewNotes,
        ]);
        session()->flash('success', 'Laporan berhasil ditolak.');
        return redirect()->route('reports.show', $this->reportId);
    }

    public function suggest($suggestion)
    {
        // Implement logic for suggestions
        // Optionally, you can store the suggestion to a relevant model or handle it as needed.
        session()->flash('success', 'Saran telah dikirim.');
        return redirect()->route('reports.show', $this->reportId);
    }

    public function render()
    {
        return view('livewire.admin.reports.show');
    }
}
