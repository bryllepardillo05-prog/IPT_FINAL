<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Trainer;

class GymController extends Controller
{
    // QUERY 1: Pag-kuha sa tanang Active Members ug ilang active membership details
    public function queryActiveMemberships()
    {
        $data = Membership::with('member')
            ->where('end_date', '>=', now())
            ->get();

        return view('welcome', ['results' => $data, 'title' => 'Active Memberships']);
    }

    // QUERY 2: Pag-ihap kung pila ka workout plans ang na-assign sa matag Trainer
    public function trainerWorkoutCounts()
    {
        $data = Trainer::withCount('workoutPlans')->get();

        return view('gym.trainer_reports', ['results' => $data, 'title' => 'Trainer Workout Plans Count']);
    }
}
