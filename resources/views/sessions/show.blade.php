@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Session #{{ $session->id }}</h1>
    <table class="w-full text-sm">
        <tr><th class="text-left py-1 pr-4">Member</th><td class="py-1">{{ ($session->member->first_name ?? 'N/A') }} {{ ($session->member->last_name ?? '') }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Trainer</th><td class="py-1">{{ ($session->trainer->first_name ?? 'N/A') }} {{ ($session->trainer->last_name ?? '') }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Session Time</th><td class="py-1">{{ $session->session_time }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Status</th><td class="py-1">{{ $session->status }}</td></tr>
    </table>
    <div class="mt-5 flex gap-2">
        <a href="{{ route('sessions.edit', $session) }}" class="px-3 py-1 bg-indigo-700 text-white rounded hover:bg-indigo-600">Edit</a>
        <form method="POST" action="{{ route('sessions.destroy', $session) }}" class="inline" onsubmit="return confirm('Delete this session?');">
            @csrf
            @method('DELETE')
            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-500">Delete</button>
        </form>
        <a href="{{ route('sessions.index') }}" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">Back to list</a>
    </div>
</div>
@endsection
