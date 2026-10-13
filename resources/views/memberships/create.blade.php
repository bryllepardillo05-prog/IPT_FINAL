@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Add Membership</h1>
    <form method="POST" action="{{ route('memberships.store') }}">
        @csrf
        @include('memberships._inputs')
    </form>
</div>
@endsection
