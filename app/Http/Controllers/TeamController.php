<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Team::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'team_name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        
        $validation['event_id'] = $request->user()->id;

        $team = Team::create($validation);
        return response()->json([
            'message' => 'Team Successfully Created!',
            'store' => $team,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return response()->json($team);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $validate = $request->validate([
            'team_name' => 'somtimes|string|max:255',
            'description' => 'somtimes|string|max:255'
        ]);

        $validate['event_id'] = $request->user()->id;
        
        $team->update($validate);
        return response()->json([
            'message' => 'Team Successfully Updated',
            'team' => $team
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return response()->json([
            'message' => 'Team Successfully Deleted'
        ]);
    }
}
