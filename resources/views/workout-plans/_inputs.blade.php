<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1" for="member_id">Member</label>
        <select name="member_id" id="member_id"
            class="w-full border rounded px-3 py-2 @error('member_id') border-red-500 @enderror">
            <option value="">Select member...</option>
            @foreach ($members as $m)
                <option value="{{ $m->id }}"
                    {{ old('member_id', $workoutPlan->member_id ?? '') == $m->id ? 'selected' : '' }}>{{ $m->first_name }} {{ $m->last_name }} ({{ $m->email }})</option>
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
                <option value="{{ $t->id }}"
                    {{ old('trainer_id', $workoutPlan->trainer_id ?? '') == $t->id ? 'selected' : '' }}>{{ $t->first_name }} {{ $t->last_name }} ({{ $t->specialization }})</option>
            @endforeach
        </select>
        @error('trainer_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1" for="goal">Goal</label>
        <input type="text" name="goal" id="goal" value="{{ old('goal', $workoutPlan->goal ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('goal') border-red-500 @enderror">
        @error('goal') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1" for="details">Details</label>
        <textarea name="details" id="details" rows="4"
            class="w-full border rounded px-3 py-2 @error('details') border-red-500 @enderror">{{ old('details', $workoutPlan->details ?? '') }}</textarea>
        @error('details') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
</div>
<button type="submit" class="mt-6 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Save Workout Plan</button>
