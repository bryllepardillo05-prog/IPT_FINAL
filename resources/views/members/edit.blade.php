@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Edit Member</h1>
    <form method="POST" action="{{ route('members.update', $member) }}">
        @csrf
        @method('PUT')
        @include('members._inputs')
    </form>
</div>
@endsection
