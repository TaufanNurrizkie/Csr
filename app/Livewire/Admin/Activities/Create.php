<?php

namespace App\Livewire\Admin\Activities;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Activity;

class Create extends Component
{
    use WithFileUploads;

    public $photo;
    public $title;
    public $tags;
    public $description;
    public $status;

    protected $rules = [
        'photo' => 'required|image',
        'title' => 'required|string|max:255',
        'tags' => 'required|string',
        'description' => 'required|string',
        'status' => 'required|in:Draft,Terbit', // Use 'Draft' and 'Terbit' here
    ];

    public function save()
    {
        $this->validate();

        $activity = new Activity();

        if ($this->photo) {
            $path = $this->photo->store('photos', 'public');
            $activity->photo = $path;
        }

        $activity->title = $this->title;
        $activity->tags = $this->tags;
        $activity->description = $this->description;
        $activity->published_date = $this->status === 'Terbit' ? now() : null;
        $activity->status = $this->status;

        $activity->save();

        session()->flash('success', 'Activity created successfully.');
        
        return redirect()->route('activities.activity');

        // Reset the form
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.activities.create');
    }
}
