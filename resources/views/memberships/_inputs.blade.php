<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1" for="member_id">Member</label>
        <select name="member_id" id="member_id"
            class="w-full border rounded px-3 py-2 @error('member_id') border-red-500 @enderror">
            <option value="">Select member...</option>
            @foreach ($members as $m)
                <option value="{{ $m->id }}"
                    {{ old('member_id', $membership->member_id ?? '') == $m->id ? 'selected' : '' }}>{{ $m->first_name }} {{ $m->last_name }} ({{ $m->email }})</option>
            @endforeach
        </select>
        @error('member_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1" for="type">Type</label>
        <input type="text" name="type" id="type" value="{{ old('type', $membership->type ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('type') border-red-500 @enderror">
        @error('type') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1" for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $membership->price ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('price') border-red-500 @enderror">
        @error('price') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1" for="start_date">Start Date</label>
        <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $membership->start_date ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('start_date') border-red-500 @enderror">
        @error('start_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1" for="end_date">End Date</label>
        <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $membership->end_date ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('end_date') border-red-500 @enderror">
        @error('end_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
</div>
<button type="submit" class="mt-6 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Save Membership</button>
