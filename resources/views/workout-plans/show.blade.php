@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Workout Plan #{{ $workoutPlan->id }}</h1>
    <table class="w-full text-sm">
        <tr><th class="text-left py-1 pr-4">Goal</th><td class="py-1">{{ $workoutPlan->goal }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Member</th><td class="py-1">{{ ($workoutPlan->member->first_name ?? 'N/A') }} {{ ($workoutPlan->member->last_name ?? '') }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Trainer</th><td class="py-1">{{ ($workoutPlan->trainer->first_name ?? 'N/A') }} {{ ($workoutPlan->trainer->last_name ?? '') }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Details</th><td class="py-1 whitespace-pre-wrap">{{ $workoutPlan->details }}</td></tr>
    </table>
    <div class="mt-5 flex gap-2">
        <a href="{{ route('workout-plans.edit', $workoutPlan) }}" class="px-3 py-1 bg-indigo-700 text-white rounded hover:bg-indigo-600">Edit</a>
        <form method="POST" action="{{ route('workout-plans.destroy', $workoutPlan) }}" class="inline" onsubmit="return confirm('Delete this workout plan?');">
            @csrf
            @method('DELETE')
            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-500">Delete</button>
        </form>
        <a href="{{ route('workout-plans.index') }}" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">Back to list</a>
    </div>
</div>
@endsection
