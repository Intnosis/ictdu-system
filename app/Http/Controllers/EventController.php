<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Event::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'type' => 'required|enum:comptition,hackathon,seminar,training',
            ]);

            $user = $request->user();
            $validate['user_id']

        $event = Event::create($validate);
        return response()->json([
            'message'=>'Event Successfully Created',
            'event'=> $event,
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
       $validation = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|text',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'type' => 'required|enum:comptition,hackathon,seminar,training',
       ]);
       $event->update($validation);
       return response()->json([
           'message' => 'Event Successfully Updated',
           'event' => $event
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json([
            'message' => 'Event Successfully Deleted'
        ]);
    }
}
