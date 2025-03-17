<?php

namespace App\Livewire;

use App\Livewire\Forms\WordForm;
use App\Models\Word;
use App\Models\Language;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;
use Log;

class EditWord extends AdminComponent
{
    use WithFileUploads;

    public WordForm $form;

    public array $languages = []; // To store the list of languages

    public ?int $selectedLanguageId = null; // To store the selected language ID


    public function mount(Word $word)
    {
        $this->form->setWord($word);
        $this->languages = Language::pluck('name', 'id')->toArray(); // Fetch languages
        $this->selectedLanguageId = $word->language_id; // Set initially selected language
    }

    public function save()
    {
        $this->form->update();
        $this->form->word->language_id = $this->selectedLanguageId; // Assign selected language
        $this->form->word->save(); // Save the word

        session()->flash('status', 'Word successfully updated.');
        $this->redirectRoute('dashboard.words.index');
    }

    public function render()
    {
        return view('livewire.edit-word', ['languages' => $this->languages]);
    }
}
