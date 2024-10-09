<?php

namespace App\Livewire\Admin\Activities;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Activity;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $activities = Activity::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->paginate(5);

        return view('livewire.admin.activities.index', compact('activities'));
    }

    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination saat pencarian diubah
    }
}
