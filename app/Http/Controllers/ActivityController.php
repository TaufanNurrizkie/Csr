<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $activities = Activity::paginate(5); // Paginate the activities
        return view('activities.activity', compact('activities'));
    }
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, $id)
{
    $activity = Activity::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:10240',
    ]);

    // Update the activity details
    $activity->title = $request->title;
    $activity->tags = $request->tags;
    $activity->description = $request->description;

    // Handle file upload if a new photo is uploaded
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('photos', 'public');
        $activity->photo = $path;
    }

    // Determine status based on the button clicked
    if ($request->input('action') === 'publish') {
        $activity->status = 'Terbit';
        $activity->published_date = now();
    } else {
        $activity->status = 'Draft';
        $activity->published_date = null;
    }

    $activity->save();

    return redirect()->route('activities.activity')->with('success', 'Activity updated successfully.');
}


    public function create()
    {
        return view('activities.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image',
            'title' => 'required|string|max:255',
            'tags' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:Draft,Terbit', // Use 'Draft' and 'Terbit' here
        ]);
        
    
        $activity = new Activity();
    
        // Reordered assignments
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $activity->photo = $path; // Handle file upload if a photo is uploaded
        }
        
        $activity->title = $request->title;            // Title first
        $activity->tags = $request->tags;              // Tags second
        $activity->description = $request->description; // Description third
        $activity->published_date = $request->status === 'Terbit' ? now() : null; // Published date fourth
        $activity->status = $request->status;          // Status last
    
        $activity->save();
    
        return redirect()->route('activities.activity')->with('success', 'Activity created successfully.');
    }
    public function show($id)
    {
        $activity = Activity::findOrFail($id);

        return view('activities.show', compact('activity'));
    }
    
}
