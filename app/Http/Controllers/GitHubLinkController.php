<?php

namespace App\Http\Controllers;

use App\Models\GitHubLink;
use Illuminate\Http\Request;

class GitHubLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(GitHubLink::all(), 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'project_name' => 'required|string|max:255',
            'repo_link' => 'required|url|string|max:255',
            'description' => 'required|string|text',
            'tech_stack' => 'required|nullable|string|max:255',
            'status' => 'required|string|max:255',
            ]);

        $gitHubLink = GitHubLink::create($validate);
        return response()->json($gitHubLink, 201);
    }

    public function show(GitHubLink $gitHubLink)
    {
        return response()->json(GitHubLink::find($gitHubLink->id),200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GitHubLink $gitHubLink)
    {
        $validate = $request->validate([
            'project_name' => 'required|string|max:255',
            'repo_link' => 'required|url|string|max:255',
            'description' => 'required|string|text',
            'tech_stack' => 'required|nullable|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $gitHubLink->update($validate);
        return response()->json($gitHubLink, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GitHubLink $gitHubLink)
    {
        $gitHubLink->delete();
        return response()->json(
            ["message" => "GitHub link deleted successfully"]
        );
    }
}
