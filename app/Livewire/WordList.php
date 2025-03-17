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
            'words' => $query->paginate(10)
        ]);

    }

    public function updatingPage($page)
    {
        // Store the current page in session
        session()->put('last_page_' . static::class, $page);
    }
}
