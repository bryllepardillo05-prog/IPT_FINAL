@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Trainers</h1>
    <a href="{{ route('trainers.create') }}" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Add Trainer</a>
</div>

<form method="GET" action="{{ route('trainers.index') }}" class="mb-4 flex items-center gap-2">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or specialization..." class="px-3 py-2 border rounded w-64">
    <button class="px-3 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Search</button>
    @if (request('search'))
        <a href="{{ route('trainers.index') }}" class="px-3 py-2 bg-gray-300 rounded hover:bg-gray-400">Clear</a>
    @endif
</form>

<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4 text-left">ID</th>
                <th class="py-2 px-4 text-left">Name</th>
                <th class="py-2 px-4 text-left">Specialization</th>
                <th class="py-2 px-4 text-left">Phone</th>
                <th class="py-2 px-4 text-left">Salary</th>
                <th class="py-2 px-4 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @forelse ($trainers as $t)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">{{ $t->id }}</td>
                <td class="py-2 px-4">{{ $t->first_name }} {{ $t->last_name }}</td>
                <td class="py-2 px-4">{{ $t->specialization }}</td>
                <td class="py-2 px-4">{{ $t->phone }}</td>
                <td class="py-2 px-4">₱{{ number_format($t->salary ?? 0, 2) }}</td>
                <td class="py-2 px-4 text-center space-x-2">
                    <a href="{{ route('trainers.show', $t) }}" class="text-blue-600 hover:underline">View</a>
                    <a href="{{ route('trainers.edit', $t) }}" class="text-indigo-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('trainers.destroy', $t) }}" class="inline" onsubmit="return confirm('Delete this trainer?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-4 px-4 text-center text-gray-500">No trainers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
