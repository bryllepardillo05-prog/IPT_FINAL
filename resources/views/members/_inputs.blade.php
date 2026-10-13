<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block text-sm font-medium mb-1" for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $member->first_name ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('first_name') border-red-500 @enderror">
        @error('first_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1" for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $member->last_name ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('last_name') border-red-500 @enderror">
        @error('last_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1" for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $member->email ?? '') }}"
            class="w-full border rounded px-3 py-2 @error('email') border-red-500 @enderror">
        @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1" for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', $member->phone ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium mb-1" for="date_of_birth">Date of Birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth"
            value="{{ old('date_of_birth', $member->date_of_birth ?? '') }}" class="w-full border rounded px-3 py-2">
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1" for="status">Status</label>
        <select name="status" id="status"
            class="w-full border rounded px-3 py-2 @error('status') border-red-500 @enderror">
            @foreach (['active' => 'Active', 'inactive' => 'Inactive', 'expired' => 'Expired'] as $value => $label)
                <option value="{{ $value }}"
                    {{ (old('status', $member->status ?? '') == $value) ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
</div>
<button type="submit" class="mt-6 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Save Member</button>
