<?php

namespace App\Livewire;

use App\Models\Word;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Words')]
class WordIndex extends Component
{
    public function render()
    {
        return view('livewire.word-index', [
            'words' => Word::all(),
        ]);
    }
}
