@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Member #{{ $member->id }}</h1>
    <table class="w-full text-sm">
        <tr><th class="text-left py-1 pr-4">First Name</th><td class="py-1">{{ $member->first_name }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Last Name</th><td class="py-1">{{ $member->last_name }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Email</th><td class="py-1">{{ $member->email }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Phone</th><td class="py-1">{{ $member->phone }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Date of Birth</th><td class="py-1">{{ $member->date_of_birth }}</td></tr>
        <tr><th class="text-left py-1 pr-4">Status</th><td class="py-1">{{ $member->status }}</td></tr>
    </table>
    <div class="mt-5 flex gap-2">
        <a href="{{ route('members.edit', $member) }}" class="px-3 py-1 bg-indigo-700 text-white rounded hover:bg-indigo-600">Edit</a>
        <form method="POST" action="{{ route('members.destroy', $member) }}" class="inline" onsubmit="return confirm('Delete this member?');">
            @csrf
            @method('DELETE')
            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-500">Delete</button>
        </form>
        <a href="{{ route('members.index') }}" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">Back to list</a>
    </div>
</div>
@endsection
