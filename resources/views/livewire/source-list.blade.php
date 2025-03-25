<div>
    <div class="mb-4">
        <a href="{{ route('dashboard.sources.create') }}"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Create Source
        </a>
    </div>
    <x-mary-table :headers="$this->headers" :rows="$sources" />
    {{ $sources->links() }}
</div>