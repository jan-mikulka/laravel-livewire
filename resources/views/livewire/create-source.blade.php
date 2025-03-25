<div class="m-auto w-1/2 mb-4 bg-white p-4 rounded-lg shadow">
    <h3 class="text-lg text-gray-800 mb-3">Create Source</h3>

    <x-mary-form wire:submit="save">
        <div class="mb-3">
            <x-mary-input type="text" wire:model="form.name" label="Name" />
        </div>

        <div class="mb-3">
            <x-mary-input type="text" wire:model="form.url" label="URL" />
        </div>

        <div class="mb-3">
            <x-mary-input type="text" wire:model="form.author" label="Author" />
        </div>

        <div class="mb-3">
            <x-mary-select wire:model="type" :options="$sourceTypes" label="Type" placeholder="Select type" />
        </div>

        <div class="mb-3">
            <x-mary-button type="submit" class="btn-outline btn-primary">Save</x-mary-button>
        </div>
    </x-mary-form>
</div>