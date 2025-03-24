<?php

namespace App\Livewire;

use App\Models\Word;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Manage Words')]
class WordList extends AdminComponent
{
    use withPagination;

    #[Computed]
    public function headers(): array
    {
        return [
            ['key' => 'name', 'label' => 'Title', 'sortable' => true],
            ['key' => 'content', 'label' => 'Content', 'sortable' => true],
            [
                'key' => 'languages',
                'label' => 'Languages',
                'sortable' => false,
                'format' => fn($row, $field) => collect($field)->map(fn($language) => "<span class='bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900'>{$language->name}</span>")->implode(''),

            ],
        ];
    }

    public function delete(Word $word)
    {
        $word->delete();
    }

    public function mount()
    {
        // Restore last page from session
        $lastPage = session('last_page_' . static::class, 1);
        $this->setPage($lastPage);
    }

    public function render()
    {
        $query = Word::query();

        return view('livewire.word-list', [
            'words' => $query->paginate(10),
        ]);

    }

    public function updatingPage($page)
    {
        // Store the current page in session
        session()->put('last_page_' . static::class, $page);
    }
}
