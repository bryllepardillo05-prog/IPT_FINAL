<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block text-sm font-medium mb-1" for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $trainer->first_name ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('first_name') border-red-500 @enderror">
        @error('first_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1" for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $trainer->last_name ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('last_name') border-red-500 @enderror">
        @error('last_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1" for="specialization">Specialization</label>
        <input type="text" name="specialization" id="specialization" value="{{ old('specialization', $trainer->specialization ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('specialization') border-red-500 @enderror">
        @error('specialization') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1" for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', $trainer->phone ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium mb-1" for="salary">Salary</label>
        <input type="number" step="0.01" name="salary" id="salary" value="{{ old('salary', $trainer->salary ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('salary') border-red-500 @enderror">
        @error('salary') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
</div>
<button type="submit" class="mt-6 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Save Trainer</button>
