<?php

use App\Http\Controllers\GymController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\WorkoutPlanController;
use Illuminate\Support\Facades\Route;

// Welcome / Home Route - displays active memberships report
Route::get('/', [GymController::class, 'queryActiveMemberships'])->name('reports.memberships');

// Gym report routes
Route::get('/reports/trainers', [GymController::class, 'trainerWorkoutCounts'])->name('reports.trainers');

// Gym Management System Resource Routes
Route::resource('members', MemberController::class);
Route::resource('trainers', TrainerController::class);
Route::resource('memberships', MembershipController::class);
Route::resource('workout-plans', WorkoutPlanController::class);
Route::resource('sessions', SessionController::class);
