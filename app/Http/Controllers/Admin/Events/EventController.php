<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\EventRequest;
use App\Models\Category;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::get();
        return view('dashboard.events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('dashboard.events.create', compact('categories'));
    }

    public function store(EventRequest $request)
    {
        $validated = $request->validated();
        Event::create($validated);
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $event = Event::where('id', $id)->first();
        $categories = Category::get();

        return view('dashboard.events.edit', compact(['event','categories']));
    }

    public function update(EventRequest $request, $id)
    {
        $validated = $request->validated();
        Event::where('id', $id)->update($validated);
        return redirect()->route('events.index')->with('success', 'Event created successfully.');

    }

    public function destroy($id)
    {
        Event::where('id', $id)->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
