<div class="m-auto w-1/2 mb-4 bg-white p-4 rounded-lg shadow">
    <h3 class="text-lg text-gray-800 mb-3">Create Word</h3>
    <form wire:submit="save">
        <div class="mb-3">
            <label class="block text-gray-700" for="word-name">Name</label>
            <input type="text" class="p-2 w-full border border-gray-300 rounded-md bg-gray-100 text-gray-800"
                wire:model="form.name">
            <div>
                @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class=" mb-3">
            <label class="block text-gray-700" for="word-content">Content</label>
            <textarea id="word-content" class="p-2 w-full border border-gray-300 rounded-md bg-gray-100 text-gray-800"
                wire:model="form.content"></textarea>
            <div>
                @error('content') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="block text-gray-700" for="language">Language:</label>
            <select id="language" class="p-2 w-full border border-gray-300 rounded-md bg-gray-100 text-gray-800"
                wire:model="selectedLanguageId">
                <option value="">Select Language</option>
                @foreach ($languages as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('selectedLanguageId') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <button
                class="text-gray-800 p-2 bg-blue-400 rounded-sm disabled:opacity-75 disabled:bg-blue-200 hover:bg-blue-600"
                type="submit" wire:dirty.class="hover:bg-blue-600" wire:dirty.remove.attr="disabled" disabled>
                Save
            </button>
        </div>
    </form>
</div>
