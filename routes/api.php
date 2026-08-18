<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DeadlineController;

Route::apiResource('announcements', AnnouncementController::class);
Route::apiResource('deadlines', DeadlineController::class);
