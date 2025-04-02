<div>
    <h1 class="mb-4">Edit Statement</h1>
    <form wire:submit="save">
        <x-mary-choices wire:model="form.source_id" :options="$sources" label="Source" placeholder="Search a source"
            single searchable />

        @if ($form->source_id)
                @php
                    $selectedSource = \App\Models\Source::find($form->source_id);
                @endphp
                @if ($selectedSource->type == \App\Enums\SourceType::Audio || $selectedSource->type == \App\Enums\SourceType::Video)
                    <x-mary-input wire:model="form.time" type="time" label="Time" placeholder="e.g., 00:00" />
                @elseif ($selectedSource->type === \App\Enums\SourceType::Book)
                    <x-mary-input wire:model="form.page" type="number" label="Page" />
                @endif
        @endif

        <x-mary-markdown wire:model="form.content" label="Content" :folder="'statements/' . $form->source_id" />

        <x-mary-button type="submit" class="btn-primary mt-4" label="Create" />
    </form>
</div>