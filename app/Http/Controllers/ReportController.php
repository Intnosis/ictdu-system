<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Report::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $user = $request->user();
        $validation['user_id'] = $user->id;
        $report = Report::create($validation);
        return response()->json($report, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return response()->json($report);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        $validate = $request->validate([
            'tile' => 'required|string|max255',
            'description' => 'required|string',
        ]);
        $user = $request->user();
        $validate['user_id'] = $user->id;
        $report ->update($validate);
        return response()->json($report);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return response()->json([
            'message' => 'Report successfully deleted'
        ]);
    }
}
