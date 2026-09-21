<?php

namespace App\Http\Controllers;

use App\Models\Team_Members;
use Illuminate\Http\Request;

class TeamMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Team_Members::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create = $request->validate([
            'position' => 'required|enum:Frontend, Backend, UI/UX, Developer Operations, Quality Assurance, Artificial Intelligence, Business Management'
        ]);

        $team_members = $request->user()->team__members()->create($create);
        return response()->json([
            'message' => 'Team Members, Successfully Created!',
            'team_members' => $team_members
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team_Members $team_Members)
    {
        return response()->json($team_Members);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team_Members $team_Members)
    {
        $update = $request->validate([
            'position' => 'required|enum:Frontend, 
                            Backend, UI/UX, Developer Operations,  
                            Quality Assurance, Artificial Intelligence, 
                            Business Management'


        ]);

        $team_Members->update($update);
            return response()->json([
                'message' => 'Position Successfully Created!',
                'team_members' => $team_Members
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team_Members $team_Members)
    {
        $team_Members->delete();
        return response()->json([
            'message' => 'Team mebers Successfully Deleted!'
        ]);
    }
}
