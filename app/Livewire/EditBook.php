<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class EditBook extends Component
{
    public Book $book;
    public array $form = [];

    public function mount(Book $book)
    {
        $this->book = $book;
        $this->form = [
            'title' => $book->title,
            'author' => $book->author,
            'isbn' => $book->isbn,
        ];
    }

    public function saveBook()
    {
        $this->validate([
            'form.title' => 'required|string|max:255',
            'form.author' => 'required|string|max:255',
            'form.isbn' => 'nullable|string|max:20',
        ]);

        $this->book->update($this->form);
        session()->flash('status', 'Book updated successfully!');
    }

    public function render()
    {
        return view('livewire.edit-book');
    }
}
