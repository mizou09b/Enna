<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{

    public function eventsForm(Request $request)
    {

        $eventsData = $request->validate([
            'title' => 'required',
            'observation' => 'nullable',
            'event_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|',
            'date_end_event' => ['required', 'date', 'after_or_equal:today']
        ]);

        $eventsData['title'] = strip_tags($eventsData['title']);
        $eventsData['observation'] = strip_tags($eventsData['observation']);
        $eventsData['user_id'] = Auth::id();

        if ($request->hasFile('event_image')) {
            $imagepath = $request->file('event_image')->store('images', 'public');
            $eventsData['event_image'] = $imagepath; // Store the file path in the database
        } else {
            $eventsData['event_image'] = null; // Set to null if no file was uploaded
        }

        Event::create($eventsData);
        return redirect(route('events'));
    }

    public function events()
    {
        // Get all events ordered by created_at in descending order
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('eventsViews.events', compact('events'));
    }

    //edit the event:
    public function edit_event(Event $event)
    {
        return view('eventsViews.edit_event', compact('event'));
    }

    //update the event :
    public function update_event(Request $request, Event $event)
    {
        $validation_event = $request->validate([
            'title' => 'required',
            'observation' => 'nullable',
            'event_image' => 'required|image|mimes:jpeg,png,jpg,gif|',
            'date_end_event' => ['required', 'date', 'after_or_equal:today']
        ]);

        // Check if an image was uploaded
        if ($request->hasFile('event_image')) {
            // Store the image and get the file path
            $imagePath = $request->file('event_image')->store('event_images', 'public');

            // Add the new image path to the validated data
            $validation_event['event_image'] = $imagePath;

            $event->update($validation_event);
            return redirect(route('events'))->with('success', "event edited with success");
        }
    }

    //delete event :
    public function delete_event(Event $event)
    {
        $event->delete();
        return redirect(route('events'))->with('error', 'event deleted!');
    }
}
