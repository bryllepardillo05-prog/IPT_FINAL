@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Memberships</h1>
    <a href="{{ route('memberships.create') }}" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Add Membership</a>
</div>

<form method="GET" action="{{ route('memberships.index') }}" class="mb-4 flex items-center gap-2">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by type or member..." class="px-3 py-2 border rounded w-64">
    <button class="px-3 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Search</button>
    @if (request('search'))
        <a href="{{ route('memberships.index') }}" class="px-3 py-2 bg-gray-300 rounded hover:bg-gray-400">Clear</a>
    @endif
</form>

<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4 text-left">ID</th>
                <th class="py-2 px-4 text-left">Member</th>
                <th class="py-2 px-4 text-left">Type</th>
                <th class="py-2 px-4 text-left">Price</th>
                <th class="py-2 px-4 text-left">Start Date</th>
                <th class="py-2 px-4 text-left">End Date</th>
                <th class="py-2 px-4 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @forelse ($memberships as $m)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">{{ $m->id }}</td>
                <td class="py-2 px-4">{{ ($m->member->first_name ?? 'N/A') }} {{ ($m->member->last_name ?? '') }}</td>
                <td class="py-2 px-4">{{ $m->type }}</td>
                <td class="py-2 px-4">₱{{ number_format($m->price ?? 0, 2) }}</td>
                <td class="py-2 px-4">{{ $m->start_date }}</td>
                <td class="py-2 px-4">{{ $m->end_date }}</td>
                <td class="py-2 px-4 text-center space-x-2">
                    <a href="{{ route('memberships.show', $m) }}" class="text-blue-600 hover:underline">View</a>
                    <a href="{{ route('memberships.edit', $m) }}" class="text-indigo-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('memberships.destroy', $m) }}" class="inline" onsubmit="return confirm('Delete this membership?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="py-4 px-4 text-center text-gray-500">No memberships found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
