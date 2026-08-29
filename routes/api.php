<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DeadlineController;
use App\Http\Controllers\GitHubLinkController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\EventController;

use App\Http\Controllers\Auth\AuthenticationController;


Route::apiResource('announcements', AnnouncementController::class);
Route::apiResource('deadlines', DeadlineController::class);
Route::apiResource('github-links', GitHubLinkController::class);
Route::apiResource('reports', ReportController::class);
Route::apiResource('archives', ArchiveController::class);
Route::apiResource('profiles', ProfileController::class);
Route::apiResource('teams', TeamController::class);
Route::apiResource('events', EventController::class);


