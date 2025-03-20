<?php

namespace App\Livewire;

use App\Livewire\Forms\BookForm;
use App\Models\Book;

class EditBook extends AdminComponent
{
    public BookForm $form;
    public Book $book;

    public function mount(Book $book)
    {
        $this->book = $book;
        $this->form->setBook($book);
    }

    public function save()
    {
        $this->form->update();

        session()->flash('status', 'Book successfully updated.');
        $this->redirectRoute('dashboard.books.edit', $this->book);
    }

    public function render()
    {
        return view('livewire.edit-book')->layout('components.layouts.admin');
    }
}
