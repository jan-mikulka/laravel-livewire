<?php

namespace App\Livewire;

use App\Livewire\Forms\WordForm;
use App\Models\Word;
use App\Models\Language;
use Livewire\WithFileUploads;

class EditWord extends AdminComponent
{
    use WithFileUploads;

    public WordForm $form;

    public function mount(Word $word)
    {
        $this->form->setWord($word);
        $this->languages = Language::all(); // Fetch languages
    }

    public function save()
    {
        $this->form->update();
        $this->form->word->save(); // Save the word

        session()->flash('status', 'Word successfully updated.');
        $this->redirectRoute('dashboard.words.index');
    }

    public function render()
    {
        return view('livewire.edit-word', ['languages' => $this->languages]);
    }
}
