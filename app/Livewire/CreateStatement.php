<?php

namespace App\Livewire;

use App\Enums\StatementType;
use App\Livewire\Forms\StatementForm;
use App\Models\Source;
use App\Models\Statement;
use App\Livewire\Traits\SearchableSources;


class CreateStatement extends AdminComponent
{
    use SearchableSources;
    public StatementForm $form;

    public function mount()
    {
        $lastStatement = Statement::latest()->first();

        if ($lastStatement) {
            $this->form->setStatement($lastStatement, duplicate: true);
        }
    }

    public function save()
    {
        $statement = $this->form->store();

        session()->flash('status', 'Statement successfully created.');
        $this->redirectRoute('dashboard.statements.index');
    }

    public function render()
    {
        return view('livewire.create-statement', [
            'sources' => Source::take(10)->get()
        ])->layout('components.layouts.admin');
    }
}
