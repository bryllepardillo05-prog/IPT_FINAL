@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Workout Plans</h1>
    <a href="{{ route('workout-plans.create') }}" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Add Workout Plan</a>
</div>

<form method="GET" action="{{ route('workout-plans.index') }}" class="mb-4 flex items-center gap-2">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by goal, member or trainer..." class="px-3 py-2 border rounded w-64">
    <button class="px-3 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Search</button>
    @if (request('search'))
        <a href="{{ route('workout-plans.index') }}" class="px-3 py-2 bg-gray-300 rounded hover:bg-gray-400">Clear</a>
    @endif
</form>

<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4 text-left">ID</th>
                <th class="py-2 px-4 text-left">Goal</th>
                <th class="py-2 px-4 text-left">Member</th>
                <th class="py-2 px-4 text-left">Trainer</th>
                <th class="py-2 px-4 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @forelse ($workoutPlans as $wp)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">{{ $wp->id }}</td>
                <td class="py-2 px-4">{{ $wp->goal }}</td>
                <td class="py-2 px-4">{{ ($wp->member->first_name ?? 'N/A') }} {{ ($wp->member->last_name ?? '') }}</td>
                <td class="py-2 px-4">{{ ($wp->trainer->first_name ?? 'N/A') }} {{ ($wp->trainer->last_name ?? '') }}</td>
                <td class="py-2 px-4 text-center space-x-2">
                    <a href="{{ route('workout-plans.show', $wp) }}" class="text-blue-600 hover:underline">View</a>
                    <a href="{{ route('workout-plans.edit', $wp) }}" class="text-indigo-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('workout-plans.destroy', $wp) }}" class="inline" onsubmit="return confirm('Delete this workout plan?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-4 px-4 text-center text-gray-500">No workout plans found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
