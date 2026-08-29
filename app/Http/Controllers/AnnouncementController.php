<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Announcement::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|text',

        ]);
        $announcement = Announcement::create($validate);
        return response()->json($announcement, 201);
        }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return response()->json($announcement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $validate = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|text',
        ]);
        $announcement->update($validate);
        return response()->json($announcement);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return response()->json(
            ["message" => "Announcement deleted successfully"]
        );
    }
}
