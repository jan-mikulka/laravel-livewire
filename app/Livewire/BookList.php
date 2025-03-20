<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Manage Books')]
class BookList extends AdminComponent
{
    use WithPagination;

    public function delete(Book $book)
    {
        $book->delete();
    }

    public function mount()
    {
        // Restore last page from session
        $lastPage = session('last_page_' . static::class, 1);
        $this->setPage($lastPage);
    }

    public function render()
    {
        $query = Book::query();

        return view('livewire.book-list', [
            'books' => $query->paginate(10)
        ]);
    }

    public function updatingPage($page)
    {
        // Store the current page in session
        session()->put('last_page_' . static::class, $page);
    }
}
