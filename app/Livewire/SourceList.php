<?php

namespace App\Livewire;

use App\Models\Source;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Manage Sources')]
class SourceList extends AdminComponent
{
    use WithPagination;

    #[Computed]
    public function headers(): array
    {
        return [
            ['key' => 'name', 'label' => 'Name', 'sortable' => true],
            ['key' => 'type', 'label' => 'Type', 'sortable' => true],
            ['key' => 'url', 'label' => 'URL', 'sortable' => true],
            ['key' => 'author', 'label' => 'Author', 'sortable' => true],
            ['key' => 'domain', 'label' => 'Domain', 'sortable' => true],
        ];
    }

    public function delete(Source $source)
    {
        $source->delete();
    }

    public function mount()
    {
        // Restore last page from session
        $lastPage = session('last_page_' . static::class, 1);
        $this->setPage($lastPage);
    }

    public function render()
    {
        $query = Source::query();

        return view('livewire.source-list', [
            'sources' => $query->paginate(10),
        ]);
    }

    public function updatingPage($page)
    {
        // Store the current page in session
        session()->put('last_page_' . static::class, $page);
    }
}
