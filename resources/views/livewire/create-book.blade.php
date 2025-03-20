<div x-data>
    <div class="m-auto mb-4 bg-white p-4 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Create Book</h1>
        @if (session('status'))
            <div class="text-center bg-green-400 text-gray-800 p-2 rounded">
                {{ session('status') }}
            </div>
        @endif
        <form wire:submit="save" enctype="multipart/form-data">
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" wire:model="form.title" class="w-full border border-gray-300 rounded-md">
                @error('form.title') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="author">Author</label>
                <input type="text" id="author" wire:model="form.author"
                    class="w-full border border-gray-300 rounded-md">
                @error('form.author') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" wire:model="form.isbn" class="w-full border border-gray-300 rounded-md">
                @error('form.isbn') <span class="error">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="mt-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Save</button>
        </form>
    </div>
</div>