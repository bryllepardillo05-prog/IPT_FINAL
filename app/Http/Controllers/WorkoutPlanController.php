<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Trainer;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;

class WorkoutPlanController extends Controller
{
    public function index()
    {
        $search = request('search');

        $workoutPlans = WorkoutPlan::query()
            ->with(['member', 'trainer'])
            ->when($search, function ($q, $s) {
                $q->where('goal', 'like', "%$s%")
                    ->orWhereHas('member', function ($q) use ($s) {
                        $q->where('first_name', 'like', "%$s%")
                            ->orWhere('last_name', 'like', "%$s%");
                    })
                    ->orWhereHas('trainer', function ($q) use ($s) {
                        $q->where('first_name', 'like', "%$s%")
                            ->orWhere('last_name', 'like', "%$s%");
                    });
            })
            ->latest()
            ->get();

        return view('workout-plans.index', compact('workoutPlans', 'search'));
    }

    public function create()
    {
        $members = Member::orderBy('first_name')->orderBy('last_name')->get();
        $trainers = Trainer::orderBy('first_name')->orderBy('last_name')->get();

        return view('workout-plans.create', compact('members', 'trainers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'member_id' => ['required', 'exists:members,id'],
            'trainer_id' => ['required', 'exists:trainers,id'],
            'goal' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string'],
        ]);

        WorkoutPlan::create($data);

        return redirect()->route('workout-plans.index')->with('success', 'Workout plan created successfully.');
    }

    public function show(WorkoutPlan $workoutPlan)
    {
        $workoutPlan->load(['member', 'trainer']);

        return view('workout-plans.show', compact('workoutPlan'));
    }

    public function edit(WorkoutPlan $workoutPlan)
    {
        $members = Member::orderBy('first_name')->orderBy('last_name')->get();
        $trainers = Trainer::orderBy('first_name')->orderBy('last_name')->get();

        return view('workout-plans.edit', compact('workoutPlan', 'members', 'trainers'));
    }

    public function update(Request $request, WorkoutPlan $workoutPlan)
    {
        $data = $request->validate([
            'member_id' => ['required', 'exists:members,id'],
            'trainer_id' => ['required', 'exists:trainers,id'],
            'goal' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string'],
        ]);

        $workoutPlan->update($data);

        return redirect()->route('workout-plans.index')->with('success', 'Workout plan updated successfully.');
    }

    public function destroy(WorkoutPlan $workoutPlan)
    {
        $workoutPlan->delete();

        return redirect()->route('workout-plans.index')->with('success', 'Workout plan deleted successfully.');
    }
}
