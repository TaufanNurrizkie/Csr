<?php

namespace App\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $reportId;
    public $report;
    public $reviewNotes;
    public $suggestion;
    public $revisionNotes;
    public $status; // Menyimpan status laporan
    public $isModalOpen = false;       // Untuk modal revisi
    public $isRejectModalOpen = false; // Untuk modal tolak
    public $isApproveModalOpen = false; // Untuk modal terima

    public function mount($id)
    {
        $this->reportId = $id;
        $this->loadReport();
        $this->reviewNotes = '';
        $this->suggestion = '';
        $this->revisionNotes = '';
        $this->status = $this->report->status; // Set status awal
    }

    public function loadReport()
    {
        try {
            $this->report = Report::with('mitra')->findOrFail($this->reportId);
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Laporan tidak ditemukan.');
            return redirect()->route('reports.index');
        }
    }

    // Fungsi untuk membuka dan menutup modal revisi
    public function openReviseModal() { $this->isModalOpen = true; }
    public function closeReviseModal() { $this->isModalOpen = false; $this->reset('revisionNotes'); }

    // Fungsi untuk membuka dan menutup modal tolak
    public function openRejectModal() { $this->isRejectModalOpen = true; }
    public function closeRejectModal() { $this->isRejectModalOpen = false; $this->reset('reviewNotes'); }

    // Fungsi untuk membuka dan menutup modal terima
    public function openApproveModal() { $this->isApproveModalOpen = true; }
    public function closeApproveModal() { $this->isApproveModalOpen = false; }

    public function revise()
    {
        $this->report->update([
            'revision_notes' => $this->revisionNotes,
            'status' => 'revisi'
        ]);
        $this->status = 'revisi'; // Update status lokal
        session()->flash('success', 'Revisi berhasil disimpan dan status diubah menjadi revisi.');
        $this->closeReviseModal();
    }

    public function reject()
    {
        $this->report->update([
            'status' => 'rejected',
            'review_notes' => $this->reviewNotes,
        ]);
        $this->status = 'rejected'; // Update status lokal
        session()->flash('success', 'Laporan berhasil ditolak.');
        $this->closeRejectModal();
    }

    public function approve()
    {
        $this->report->update(['status' => 'approved']);
        $this->status = 'approved'; // Update status lokal
        session()->flash('success', 'Laporan berhasil disetujui.');
        $this->closeApproveModal();
    }

    public function render()
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            return view('livewire.admin.reports.show', [
                'foto' => $this->report->foto ?? null,
            ])->layout('components.layouts.admin');
        }
    }
}
