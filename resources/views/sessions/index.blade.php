@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Gym Sessions</h1>
    <a href="{{ route('sessions.create') }}" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Add Session</a>
</div>

<form method="GET" action="{{ route('sessions.index') }}" class="mb-4 flex items-center gap-2">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by status, member or trainer..." class="px-3 py-2 border rounded w-64">
    <button class="px-3 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Search</button>
    @if (request('search'))
        <a href="{{ route('sessions.index') }}" class="px-3 py-2 bg-gray-300 rounded hover:bg-gray-400">Clear</a>
    @endif
</form>

<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4 text-left">ID</th>
                <th class="py-2 px-4 text-left">Member</th>
                <th class="py-2 px-4 text-left">Trainer</th>
                <th class="py-2 px-4 text-left">Session Time</th>
                <th class="py-2 px-4 text-left">Status</th>
                <th class="py-2 px-4 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @forelse ($sessions as $s)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">{{ $s->id }}</td>
                <td class="py-2 px-4">{{ ($s->member->first_name ?? 'N/A') }} {{ ($s->member->last_name ?? '') }}</td>
                <td class="py-2 px-4">{{ ($s->trainer->first_name ?? 'N/A') }} {{ ($s->trainer->last_name ?? '') }}</td>
                <td class="py-2 px-4">{{ $s->session_time }}</td>
                <td class="py-2 px-4">{{ $s->status }}</td>
                <td class="py-2 px-4 text-center space-x-2">
                    <a href="{{ route('sessions.show', $s) }}" class="text-blue-600 hover:underline">View</a>
                    <a href="{{ route('sessions.edit', $s) }}" class="text-indigo-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('sessions.destroy', $s) }}" class="inline" onsubmit="return confirm('Delete this session?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-4 px-4 text-center text-gray-500">No sessions found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
