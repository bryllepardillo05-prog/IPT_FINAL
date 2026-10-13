<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Gym Management System' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
<nav class="bg-gray-800 text-white px-4 py-3">
    <div class="container mx-auto flex flex-wrap items-center gap-2">
        <a href="{{ route('reports.memberships') }}" class="font-bold text-lg">🏋️ Gym Management System</a>
        <div class="flex flex-wrap gap-1">
            <a href="{{ route('reports.memberships') }}" class="px-3 py-1 rounded hover:bg-gray-700 {{ request()->is('/') ? 'bg-gray-700' : '' }}">Dashboard</a>
            <a href="{{ route('members.index') }}" class="px-3 py-1 rounded hover:bg-gray-700 {{ request()->routeIs('members.*') ? 'bg-gray-700' : '' }}">Members</a>
            <a href="{{ route('trainers.index') }}" class="px-3 py-1 rounded hover:bg-gray-700 {{ request()->routeIs('trainers.*') ? 'bg-gray-700' : '' }}">Trainers</a>
            <a href="{{ route('memberships.index') }}" class="px-3 py-1 rounded hover:bg-gray-700 {{ request()->routeIs('memberships.*') ? 'bg-gray-700' : '' }}">Memberships</a>
            <a href="{{ route('workout-plans.index') }}" class="px-3 py-1 rounded hover:bg-gray-700 {{ request()->routeIs('workout-plans.*') ? 'bg-gray-700' : '' }}">Workout Plans</a>
            <a href="{{ route('sessions.index') }}" class="px-3 py-1 rounded hover:bg-gray-700 {{ request()->routeIs('sessions.*') ? 'bg-gray-700' : '' }}">Sessions</a>
            <a href="{{ route('reports.trainers') }}" class="px-3 py-1 rounded hover:bg-gray-700 {{ request()->is('reports/trainers') ? 'bg-gray-700' : '' }}">Trainer Report</a>
        </div>
    </div>
</nav>
<main class="container mx-auto px-4 py-6">
    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    @yield('content')
</main>
</body>
</html>
