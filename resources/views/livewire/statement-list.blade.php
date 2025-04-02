<div>
    <div class="mb-4 flex justify-between items-center">
        <a href="{{ route('dashboard.statements.create') }}"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" wire:navigate>
            Create Statement
        </a>
    </div>
    @if (session('status'))
        <div class="text-center bg-green-400 text-gray-800 p-2 rounded">
            {{ session('status') }}
        </div>
    @endif
    <x-mary-table :headers="$this->headers" :rows="$statements" with-pagination>
        @scope('actions', $statement)
        <div class="flex space-x-2">
            <x-mary-button icon="o-pencil" href="{{ route('dashboard.statements.edit', $statement->id) }}" wire:navigate
                spinner class="btn-sm" />
            <x-mary-button icon="o-trash" wire:click="delete({{ $statement->id }})" spinner
                wire:confirm="Are you sure you want to delete this statement?" class="btn-sm" />
        </div>
        @endscope
    </x-mary-table>
</div>