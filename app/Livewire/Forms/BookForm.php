<?php

namespace App\Livewire\Forms;

use App\Models\Book;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BookForm extends Form
{
    public ?Book $book;

    public ?int $id = null;

    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('required|string|max:255')]
    public string $author = '';

    #[Validate('nullable|string|max:20')]
    public ?string $isbn = null;

    #[Validate('nullable|string')]
    public ?string $description = null;

    public function setBook(Book $book): void
    {
        $this->book = $book;
        $this->id = $book->id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->isbn = $book->isbn;
    }

    public function store(): Book
    {
        $this->validate();

        $bookData = $this->only(['title', 'author', 'isbn']);

        $book = Book::create($bookData);

        return $book;
    }

    public function update(): void
    {
        $this->validate();

        $bookData = $this->only(['title', 'author', 'isbn']);

        $this->book->update($bookData);
    }
}
