<?php

namespace App\Livewire\Admin\Activities;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $status = 'all'; // Status default

    public function render()
    {
        // Query untuk mengambil kegiatan berdasarkan pencarian dan status
        $activities = Activity::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->status !== 'all', function ($query) {
                $query->where('status', $this->status);
            })
            ->paginate(5);
            
            if(Auth::user() && Auth::user()->hasRole('admin')) {
                return view('livewire.admin.activities.index', compact('activities'))->layout('components.layouts.admin');
            }
    }

    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination saat pencarian diubah
    }

    // Method untuk mengubah status kegiatan
    public function setStatus($status)
    {
        $this->status = $status;
        $this->resetPage(); // Reset pagination saat status diubah
    }
}
