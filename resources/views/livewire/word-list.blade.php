<div class="m-auto mb-4 bg-white p-4 rounded-lg shadow">
    <div class="mb-3 flex justify-between items-center">
        <a href="/dashboard/words/create" class="text-blue-500 hover:text-blue-700" wire:navigate>
            Create Word
        </a>
    </div>
    @if (session('status'))
        <div class="text-center bg-green-400 text-gray-800 p-2 rounded">
            {{ session('status') }}
        </div>
    @endif

    <x-mary-table :rows="$words" :headers="$this->headers" with-pagination>
        @scope('cell_languages', $value)
        @foreach ($value->languages as $language)
            <x-mary-badge :value="$language->name" />
        @endforeach
        @endscope

        @scope('actions', $word)
        <div class="flex space-x-2">
            <x-mary-button icon="o-pencil" href="/dashboard/words/{{ $word->id }}/edit" wire:navigate spinner
                class="btn-sm" />
            <x-mary-button icon="o-trash" wire:click="delete({{ $word->id }})" spinner
                wire:confirm="Are you sure you want to delete this word?" class="btn-sm" />
        </div>
        @endscope
    </x-mary-table>
</div>