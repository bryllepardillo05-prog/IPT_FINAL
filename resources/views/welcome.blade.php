@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">🏋️‍♂️ Gym Management System - Active Memberships</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-800 text-white uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Member Name</th>
                    <th class="py-3 px-6 text-left">Membership Type</th>
                    <th class="py-3 px-6 text-left">Price</th>
                    <th class="py-3 px-6 text-left">Start Date</th>
                    <th class="py-3 px-6 text-left">End Date</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse(($results ?? []) as $row)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $row->id }}</td>
                    <td class="py-3 px-6 text-left">
                        {{ ($row->member->first_name ?? 'N/A') }} {{ ($row->member->last_name ?? '') }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs font-bold">
                            {{ $row->type ?? ($row->plan_type ?? 'N/A') }}
                        </span>
                    </td>
                    <td class="py-3 px-6 text-left">₱{{ number_format($row->price ?? 0, 2) }}</td>
                    <td class="py-3 px-6 text-left">{{ $row->start_date ?? 'N/A' }}</td>
                    <td class="py-3 px-6 text-left">{{ $row->end_date ?? 'N/A' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-4 px-6 text-center text-gray-500">Walay nakita nga active memberships.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
