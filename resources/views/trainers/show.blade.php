@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Trainer #{{ $trainer->id }}</h1>
    <table class="w-full text-sm">
        <tr><th class="text-left py-1 pr-4">First Name</th><td class="py-1">{{ $trainer->first_name }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Last Name</th><td class="py-1">{{ $trainer->last_name }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Specialization</th><td class="py-1">{{ $trainer->specialization }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Phone</th><td class="py-1">{{ $trainer->phone }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Salary</th><td class="py-1">₱{{ number_format($trainer->salary ?? 0, 2) }}</td></tr>
    </table>
    <div class="mt-5 flex gap-2">
        <a href="{{ route('trainers.edit', $trainer) }}" class="px-3 py-1 bg-indigo-700 text-white rounded hover:bg-indigo-600">Edit</a>
        <form method="POST" action="{{ route('trainers.destroy', $trainer) }}" class="inline" onsubmit="return confirm('Delete this trainer?');">
            @csrf
            @method('DELETE')
            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-500">Delete</button>
        </form>
        <a href="{{ route('trainers.index') }}" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">Back to list</a>
    </div>
</div>
@endsection
