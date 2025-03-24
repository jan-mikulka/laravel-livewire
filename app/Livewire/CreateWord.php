<?php

namespace App\Livewire;

use App\Livewire\Forms\WordForm;
use App\Models\Language;
use Livewire\Component;

class CreateWord extends AdminComponent
{
    public WordForm $form;

    public function mount()
    {
        $this->languages = Language::all();
    }

    public function save()
    {
        $this->validateOnly('form', [
            'form.name' => 'required|string|max:255',
            'form.content' => 'required|string',
        ]);

        $this->form->store(); // WordForm handles saving

        session()->flash('status', 'Word successfully created.');
        $this->redirectRoute('dashboard.words.index');
    }

    public function render()
    {
        return view('livewire.create-word', ['languages' => $this->languages]);
    }
}
