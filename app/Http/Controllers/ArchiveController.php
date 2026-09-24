<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response() ->json(Archive::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'file_path' => 'required|string|max:255',
            'uploaded_by' => 'required|id|exists:users,id',
        ]);

    $archive = $request->user()->archives()->create($validate);
    return response()->json([
        'message' => 'Arcvhive Successfully Created',
        'archive' => $archive
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Archive $archive)
    {
        return response()->json($archive);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archive $archive)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'file_path' => 'required|string|max:255',
            'uploaded_by' => 'required|id|exists:users,id',
        ]);
        $archive->update($validation);
        return response()->json([
            'message' => 'Archive Successfully Updated',
            'archive' => $archive
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archive $archive)
    {
        $archive->delete();
        return response()->json([
            'message' => 'Archive Successfully Deleted'
        ]);
    }
}
