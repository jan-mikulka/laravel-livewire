<?php

namespace App\Livewire\Forms;

use App\Models\Word;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class WordForm extends Form
{
    public ?Word $word;

    #[Locked]
    public int $id;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $content = '';

    public $language_id;

    public function setWord(Word $word)
    {
        $this->id = $word->id;
        $this->name = $word->name;
        $this->content = $word->content;
        $this->language_id = $word->language_id;

        $this->word = $word;
    }

    public function store()
    {
        $this->validate();

        return Word::create($this->only([
            'name',
            'content',
            'language_id'
        ]));
    }

    public function update()
    {
        $this->validate();

        $this->word->update(
            $this->only([
                'name',
                'content',
                'language_id'
            ])
        );
    }
}
