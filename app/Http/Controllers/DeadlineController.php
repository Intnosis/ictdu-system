<?php

namespace App\Http\Controllers;

use App\Models\Deadline;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Deadline::with('user'), 200);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);
        $deadline = Deadline::create($validate);
        return response()->json($deadline, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Deadline $deadline)
    {
        return response()->json($deadline);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deadline $deadline)
    {
        $validate = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'deadline' => 'sometimes|required|date',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);
        $deadline->update($validate);
        return response()->json($deadline);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deadline $deadline)
    {
        $deadline->delete();
        return response()->json(
            ["message" => "Deadline deleted successfully"]
        );
    }
}
