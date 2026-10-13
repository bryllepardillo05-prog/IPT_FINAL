@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Membership #{{ $membership->id }}</h1>
    <table class="w-full text-sm">
        <tr><th class="text-left py-1 pr-4">Member</th><td class="py-1">{{ ($membership->member->first_name ?? 'N/A') }} {{ ($membership->member->last_name ?? '') }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Type</th><td class="py-1">{{ $membership->type }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Price</th><td class="py-1">₱{{ number_format($membership->price ?? 0, 2) }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Start Date</th><td class="py-1">{{ $membership->start_date }}</td></tr>
        <tr><th class="text-left py-1 pr-4">End Date</th><td class="py-1">{{ $membership->end_date }}</td></tr>
    </table>
    <div class="mt-5 flex gap-2">
        <a href="{{ route('memberships.edit', $membership) }}" class="px-3 py-1 bg-indigo-700 text-white rounded hover:bg-indigo-600">Edit</a>
        <form method="POST" action="{{ route('memberships.destroy', $membership) }}" class="inline" onsubmit="return confirm('Delete this membership?');">
            @csrf
            @method('DELETE')
            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-500">Delete</button>
        </form>
        <a href="{{ route('memberships.index') }}" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">Back to list</a>
    </div>
</div>
@endsection
