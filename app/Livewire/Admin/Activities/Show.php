<?php

namespace App\Livewire\Admin\Activities;

use Livewire\Component;
use App\Models\Activity;

class Show extends Component
{
    public $activity;

    public function mount($id)
    {
        $this->activity = Activity::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.activities.show');
    }
}
