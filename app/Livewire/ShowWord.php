<?php

namespace App\Livewire;

use App\Models\Word;
use Livewire\Component;

class ShowWord extends Component
{
    public Word $word;

    public function mount(Word $word)
    {
        $this->word = $word;
    }

    public function render()
    {
        return view('livewire.show-word');
    }
}
