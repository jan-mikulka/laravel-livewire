<?php

namespace App\Livewire;

use App\Enums\SourceType;
use App\Livewire\Forms\SourceForm;
use Livewire\Component;

class CreateSource extends AdminComponent
{
    public SourceForm $form;

    public function save()
    {
        $source = $this->form->store();

        session()->flash('status', 'Source successfully created.');
        $this->redirectRoute('dashboard.sources.index');
    }

    public function render()
    {
        return view('livewire.create-source', [
            'sourceTypes' => SourceType::cases(),
        ])->layout('components.layouts.admin');
    }
}
