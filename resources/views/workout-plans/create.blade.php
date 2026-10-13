@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Add Workout Plan</h1>
    <form method="POST" action="{{ route('workout-plans.store') }}">
        @csrf
        @include('workout-plans._inputs')
    </form>
</div>
@endsection
