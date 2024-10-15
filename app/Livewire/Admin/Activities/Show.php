<?php

namespace App\Livewire\Admin\Activities;

use Livewire\Component;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $activity;

    public function mount($id)
    {
        $this->activity = Activity::findOrFail($id);
    }

    public function render()
    {
        if(Auth::user() && Auth::user()->hasRole('admin')) {
            return view('livewire.admin.activities.show')->layout('components.layouts.admin');
        }
    }
}
