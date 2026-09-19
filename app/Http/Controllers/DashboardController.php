<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use App\Models\GitHubLink;
use App\Models\Report;
use App\Models\Event;
use App\Models\Deadline;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

    public function index()
    {
        return response()->json([
        'total_users' => User::count(),
        'total_announcements' => Announcement::count(),
        'total_deadlines' => Deadline::count(),
        'total_github_projects' => GitHubLink::count(),
        'total_reports' => Report::count(),
        'total_events' => Event::count(),


        'recent_announcements' => Announcement::latest()
            ->take(5)->get(),

        'upcomming_deadlines' => Deadline::where('deadline', '>=',
            now()->toDateString()
            )
            ->orderBy('deadline')
            ->take(5)
            ->get()

            ]);

        }

}
