@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Edit Membership</h1>
    <form method="POST" action="{{ route('memberships.update', $membership) }}">
        @csrf
        @method('PUT')
        @include('memberships._inputs')
    </form>
</div>
@endsection
