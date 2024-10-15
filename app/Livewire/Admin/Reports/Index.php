<?php

namespace App\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\Report;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $search = ''; // Properti untuk pencarian
    public $filters = [
        'status' => null,
        'year' => null,
        'quarter' => null,
    ]; // Properti untuk menyimpan filter
    public $reviewNotes; // Properti untuk catatan ulasan saat penolakan
    public $suggestion; // Properti untuk saran

    // Tampilkan laporan dengan pencarian dan filter
    public function render()
    {
        $reports = Report::when($this->search, function ($query) {
            return $query->where('title', 'like', '%' . $this->search . '%')
                         ->orWhere('reporter_name', 'like', '%' . $this->search . '%');
        })->when($this->filters['status'], function ($query) {
            return $query->where('status', $this->filters['status']);
        })->when($this->filters['year'], function ($query) {
            return $query->whereYear('created_at', $this->filters['year']);
        })->when($this->filters['quarter'], function ($query) {
            $monthRanges = [
                '1' => [1, 3], // Q1
                '2' => [4, 6], // Q2
                '3' => [7, 9], // Q3
                '4' => [10, 12], // Q4
            ];

            if (array_key_exists($this->filters['quarter'], $monthRanges)) {
                return $query->whereMonth('created_at', '>=', $monthRanges[$this->filters['quarter']][0])
                             ->whereMonth('created_at', '<=', $monthRanges[$this->filters['quarter']][1]);
            }
        })->paginate(10);

        if(Auth::user() && Auth::user()->hasRole('admin')) {
            return view('livewire.admin.reports.index', compact('reports'))->layout('components.layouts.admin');
        }
    }

    // Proses persetujuan laporan
    public function approve($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'approved';
        $report->reviewed_by = auth()->user()->id; // ID admin yang menyetujui laporan
        $report->save();

        $this->dispatch('sweet-alert', ['icon' => 'success', 'title' => 'Laporan Telah Disetujui']);
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

    // Metode untuk mengatur status filter
    public function setStatusFilter($status)
    {
        $this->filters['status'] = $status;
    }
}
