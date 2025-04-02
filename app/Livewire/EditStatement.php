<?php

namespace App\Livewire;

use App\Models\Language;
use App\Models\Source;
use App\Models\Statement;
use Livewire\Component;
use App\Livewire\Traits\SearchableSources;


class EditStatement extends Component
{
    use SearchableSources;
    public Statement $form;
    public $languages;

    public function mount(Statement $statement)
    {
        $this->form = $statement;
        $this->languages = Language::all();
    }

    public function save()
    {
        $this->validate([
            'form.content' => 'required|string',
            'form.language_id' => 'required|exists:languages,id',
        ]);

        $this->form->save();

        session()->flash('status', 'Statement updated successfully.');

        return redirect()->route('dashboard.statements.index');
    }

    public function render()
    {
        return view('livewire.edit-statement', [
            'sources' => Source::take(10)->get()
        ]);
    }
}
