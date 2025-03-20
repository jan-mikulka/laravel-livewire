<div>
    <div class="mb-4">
        <h1 class="text-xl font-bold my-4">Chapters</h1>
        <ul>
            @foreach ($chapters as $index => $chapter)
                <li class="flex items-center space-x-2 mb-2">
                    <input type="text" wire:model="chapters.{{ $index }}.title"
                        class="border border-gray-300 rounded-md flex-grow" placeholder="Chapter Title">
                    <button wire:click="removeChapter({{ $index }})"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="flex items-center space-x-2">
        <input type="text" wire:model="newChapterTitle" placeholder="New Chapter Title"
            class="border border-gray-300 rounded-md flex-grow">
        <button wire:click="addChapter" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add
            Chapter</button>
    </div>
    <div class="mt-4">
        <button wire:click="save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save
            Chapters</button>
    </div>
</div>