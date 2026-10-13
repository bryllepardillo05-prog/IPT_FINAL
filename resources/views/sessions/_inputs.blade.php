@php
    $memberSelected = old('member_id', $session->member_id ?? null);
    $trainerSelected = old('trainer_id', $session->trainer_id ?? null);
    $sessionTime = old('session_time', $session->session_time ?? null);
    $sessionTimeFormatted = $sessionTime ? \Illuminate\Support\Carbon::parse($sessionTime)->format('Y-m-d\TH:i') : '';
    $statusSelected = old('status', $session->status ?? '');
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1" for="member_id">Member</label>
        <select name="member_id" id="member_id"
            class="w-full border rounded px-3 py-2 @error('member_id') border-red-500 @enderror">
            <option value="">Select member...</option>
            @foreach ($members as $m)
                <option value="{{ $m->id }}" {{ ($memberSelected == $m->id) ? 'selected' : '' }}>{{ $m->first_name }} {{ $m->last_name }} ({{ $m->email }})</option>
            @endforeach
        </select>
        @error('member_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1" for="trainer_id">Trainer</label>
        <select name="trainer_id" id="trainer_id"
            class="w-full border rounded px-3 py-2 @error('trainer_id') border-red-500 @enderror">
            <option value="">Select trainer...</option>
            @foreach ($trainers as $t)
                <option value="{{ $t->id }}" {{ ($trainerSelected == $t->id) ? 'selected' : '' }}>{{ $t->first_name }} {{ $t->last_name }} ({{ $t->specialization }})</option>
            @endforeach
        </select>
        @error('trainer_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1" for="session_time">Session Time</label>
        <input type="datetime-local" name="session_time" id="session_time" value="{{ $sessionTimeFormatted }}"
            class="w-full border rounded px-3 py-2 @error('session_time') border-red-500 @enderror">
        @error('session_time') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1" for="status">Status</label>
        <select name="status" id="status"
            class="w-full border rounded px-3 py-2 @error('status') border-red-500 @enderror">
            @foreach (['Scheduled', 'Completed', 'Cancelled'] as $status)
                <option value="{{ $status }}" {{ ($statusSelected == $status) ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>
        @error('status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
</div>
<button type="submit" class="mt-6 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Save Session</button>
