<?php

namespace App\Http\Controller;

use App\Model\User;
use App\Model\Announcement;
use App\Model\GitHubLink;
use App\Model\Report;
use App\Model\Event;
use App\Model\Deadline;

class DashboardController extends Controller{

    public function index()
    {
        return reponse()->json([
        'total_users' => User::count(),
        'total_announcements' => Announcement::count(),
        'total_deadlines' => Deadline::count(),
        'total_github_projects' => GitHubLink::count(),
        'total_reports' => Report::count(),
        'total_events' => Event::count(),
        'total_deadlines' => Deadline::count(),
        
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