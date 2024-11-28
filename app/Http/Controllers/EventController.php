<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all(); 
        return view('events.index', compact('events'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255', 
            'date' => 'required|date', 
            'description' => 'required|string|max:1000',
            'country' => 'required|string|max:100',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan!');
    }
}
