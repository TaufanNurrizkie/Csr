<?php

namespace App\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\Report;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $reviewNotes = ''; // untuk catatan ulasan
    public $suggestion = ''; // untuk saran

    // Tampilkan semua laporan untuk admin dengan pencarian
    public function render()
    {
        $reports = Report::when($this->search, function ($query) {
            return $query->where('title', 'like', '%' . $this->search . '%')
                         ->orWhere('reporter_name', 'like', '%' . $this->search . '%');
        })->paginate(10);

        return view('livewire.admin.reports.index', compact('reports'));
    }

    // Proses persetujuan laporan
    public function approve($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'approved';
        $report->reviewed_by = auth()->user()->id; // ID admin yang menyetujui laporan
        $report->save();

        $this->dispatch('sweet-alert', icon: 'success', title: 'Laporan Telah Disetujui');

    }

    // Proses penolakan laporan
    public function reject($id)
    {
        $this->validate([
            'reviewNotes' => 'required|string|max:255',
        ]);

        $report = Report::findOrFail($id);
        $report->status = 'rejected';
        $report->review_notes = $this->reviewNotes;
        $report->reviewed_by = auth()->user()->id; // ID admin yang menolak laporan
        $report->save();

        session()->flash('success', 'Laporan telah ditolak.');
        $this->reset('reviewNotes'); // Reset catatan ulasan setelah penolakan
    }

    // Tambahkan saran
    public function suggest($id)
    {
        $this->validate([
            'suggestion' => 'required|string|max:255',
        ]);

        $report = Report::findOrFail($id);
        $report->suggestion = $this->suggestion;
        $report->save();

        session()->flash('success', 'Saran telah disampaikan.');
        $this->reset('suggestion'); // Reset saran setelah pengiriman
    }
}
