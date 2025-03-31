<?php

namespace App\Livewire\Forms;

use App\Models\Statement;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StatementForm extends Form
{
    public ?Statement $statement;

    #[Locked]
    public int $id;

    #[Validate('nullable', 'exists:sources,id')]
    public ?int $source_id = null;

    #[Validate('required', 'string', 'max:255')]
    public string $content = '';

    #[Validate('nullable', 'string')]
    public ?string $page = null;

    //Removed validate for time as it is handled by setter now
    public ?string $time = null;


    public function setStatement(Statement $statement, $duplicate = false)
    {
        $this->id = $statement->id;
        $this->source_id = $statement->source_id;
        $this->page = $statement->page;
        //Use the time getter here
        $this->time = $statement->time;

        if (!$duplicate)
            $this->content = $statement->content;

        $this->statement = $statement;
    }

    public function store(): Statement
    {
        $this->validate();

        //When storing time will be handled by setter
        return Statement::create($this->only([
            'source_id',
            'content',
            'page',
            'time',
        ]));
    }

    public function update(): Statement
    {
        $this->validate();

        //When updating time will be handled by setter
        $this->statement->update($this->only([
            'source_id',
            'content',
            'page',
            'time',
        ]));

        return $this->statement;
    }
}
