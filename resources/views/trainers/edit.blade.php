@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Edit Trainer</h1>
    <form method="POST" action="{{ route('trainers.update', $trainer) }}">
        @csrf
        @method('PUT')
        @include('trainers._inputs')
    </form>
</div>
@endsection
