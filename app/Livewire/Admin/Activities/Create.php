<?php

namespace App\Livewire\Admin\Activities;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    use WithFileUploads;

    public $photo;
    public $title;
    public $description;
    public $status;
    public $tags = '';
    

    public function mount($activity = null)
    {
        // Jika activity tidak ada, maka tidak perlu melakukan apa-apa.
        if ($activity) {
            $this->tags = $activity->tags;
        }
    }
    


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

        $this->dispatch('sweet-alert', icon: 'success', title: 'Data berhasil disimpan');

        return redirect()->route('activities.activity');

        // Reset the form
        $this->reset();
    }

    public function render()
    {
        if(Auth::user() && Auth::user()->hasRole('admin')) {
            return view('livewire.admin.activities.create')->layout('components.layouts.admin');
        }
    }
}
