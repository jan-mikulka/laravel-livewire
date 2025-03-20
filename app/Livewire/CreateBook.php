<?php

namespace App\Livewire;

use App\Livewire\Forms\BookForm;

class CreateBook extends AdminComponent
{
    public BookForm $form;

    public function save()
    {
        $book = $this->form->store();

        session()->flash('status', 'Book successfully created.');
        $this->redirectRoute('dashboard.books.edit', $book);
    }

    public function render()
    {
        return view('livewire.create-book')->layout('components.layouts.admin');
    }
}
