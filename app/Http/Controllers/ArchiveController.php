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
            'category' => 'require|d|string|max:255',
            'file_path' => 'required|string|max:255',
            'uploaded_by'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Archive $archive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archive $archive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archive $archive)
    {
        //
    }
}
