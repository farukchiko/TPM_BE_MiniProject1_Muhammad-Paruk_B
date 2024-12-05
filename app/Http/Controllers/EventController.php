<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string|max:1000',
            'country' => 'required|string|max:100',
            'image' => 'nullable|image|max:2048',
        ]);
    
        $eventData = $request->all();
    
        if ($request->hasFile('image')) {
            $eventData['image'] = $request->file('image')->store('images', 'public');
        }
    
        Event::create($eventData);
    
        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan!');
    }
    public function index()
{
    $events = Event::all();
    return view('events.index', compact('events'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255', 
        'date' => 'required|date', 
        'description' => 'required|string|max:1000',
        'country' => 'required|string|max:100',
        'image' => 'nullable|image|max:2048', 
    ]);

    $event = Event::findOrFail($id);
    $event->name = $request->name;
    $event->date = $request->date;
    $event->description = $request->description;
    $event->country = $request->country;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public/images');
        $event->image = basename($path);
    }

    $event->save();

    return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui!');
}
public function destroy($id)
{
    $event = Event::findOrFail($id);

    if ($event->image) {
        Storage::disk('public')->delete($event->image);
    }

    $event->delete();

    return redirect()->route('events.index')->with('success', 'Event berhasil dihapus!');
}
public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('events.edit', compact('event'));
}


}
