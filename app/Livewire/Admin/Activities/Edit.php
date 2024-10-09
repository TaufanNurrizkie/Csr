<?php

namespace App\Livewire\Admin\Activities;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Activity;

class Edit extends Component
{
    use WithFileUploads;

    public $activity;
    public $title;
    public $tags;
    public $description;
    public $photo;
    public $status;

    public function mount($id)
    {
        $this->activity = Activity::findOrFail($id);
        $this->title = $this->activity->title;
        $this->tags = $this->activity->tags;
        $this->description = $this->activity->description;
        $this->status = $this->activity->status;
    }

    public function updateActivity()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:10240',
        ]);

        $this->activity->title = $this->title;
        $this->activity->tags = $this->tags;
        $this->activity->description = $this->description;

        if ($this->photo) {
            $path = $this->photo->store('photos', 'public');
            $this->activity->photo = $path;
        }

        if ($this->status === 'Terbit') {
            $this->activity->status = 'Terbit';
            $this->activity->published_date = now();
        } else {
            $this->activity->status = 'Draft';
            $this->activity->published_date = null;
        }

        $this->activity->save();

        session()->flash('success', 'Activity updated successfully.');
        return redirect()->route('activities.activity');
    }

    public function render()
    {
        return view('livewire.admin.activities.edit');
    }
}
