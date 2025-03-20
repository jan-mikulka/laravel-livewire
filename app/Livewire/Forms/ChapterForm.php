<?php

namespace App\Livewire\Forms;

use App\Models\Book;
use App\Models\Chapter;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ChapterForm extends Form
{
    public ?Chapter $chapter = null;

    public ?int $id = null;

    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('required|integer|min:1')]
    public int $chapter_number = 1;

    public function __construct(Chapter $chapter = null)
    {
        if ($chapter) {
            $this->chapter = $chapter;
            $this->id = $chapter->id;
            $this->title = $chapter->title;
            $this->chapter_number = $chapter->chapter_number;
        }
    }

    public function store(Book $book): Chapter
    {
        $this->validate();
        return $book->chapters()->create($this->only(['title', 'chapter_number']));
    }

    public function update(): void
    {
        if ($this->chapter) {
            $this->validate();
            $this->chapter->update($this->only(['title', 'chapter_number']));
        }
    }
}
