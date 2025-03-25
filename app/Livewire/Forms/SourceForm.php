<?php

namespace App\Livewire\Forms;

use App\Enums\SourceType;
use App\Models\Source;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SourceForm extends Form
{
    public ?Source $source;

    #[Locked]
    public int $id;

    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('nullable|string|url|max:255')]
    public ?string $url = null;

    #[Validate('nullable|string|max:255')]
    public ?string $author = null;

    #[Validate('nullable|string|max:255')]
    public ?string $domain = null;

    #[Validate('required')]
    public string $type = SourceType::Idea->value;


    public function setSource(Source $source)
    {
        $this->id = $source->id;
        $this->name = $source->name;
        $this->url = $source->url;
        $this->author = $source->author;
        $this->domain = $source->domain;
        $this->type = $source->type;

        $this->source = $source;
    }

    public function store()
    {
        $this->validate();

        return Source::create($this->only([
            'name',
            'url',
            'author',
            'domain',
            'type',
        ]));
    }

    public function update()
    {
        $this->validate();

        $this->source->update($this->only([
            'name',
            'url',
            'author',
            'domain',
            'type',
        ]));
    }
}
