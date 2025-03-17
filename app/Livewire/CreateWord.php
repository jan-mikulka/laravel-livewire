<?php

namespace App\Livewire;

use App\Livewire\Forms\WordForm;
use App\Models\Language; // Import the Language model
use Livewire\Component;

class CreateWord extends AdminComponent
{
    public WordForm $form;

    public array $languages = []; // To store the list of languages

    public ?int $selectedLanguageId = null; // To store the selected language ID

    public function mount()
    {
        $this->languages = Language::pluck('name', 'id')->toArray(); // Fetch languages
    }


    public function save()
    {
        $this->validate([
            'form.name' => 'required|string|max:255',
            'form.content' => 'required|string',
            'selectedLanguageId' => 'required|exists:languages,id', // Validation rule for language
        ]);


        $word = $this->form->store();
        $word->language_id = $this->selectedLanguageId; // Assign selected language
        $word->save();

        session()->flash('status', 'Word successfully created.');
        $this->redirectRoute('dashboard.words.index');
    }

    public function render()
    {
        return view('livewire.create-word', ['languages' => $this->languages]);
    }
}
