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
        $activity->description = $request->description;

        // Handle file upload if a new photo is uploaded
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $activity->photo = $path;
        }

        $activity->save();

        return redirect()->route('activities.activity')->with('success', 'Activity updated successfully.');
    }
}
