<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Chapter;
use Livewire\Component;
use Livewire\WithPagination;

class EditBookChapters extends Component
{
    use WithPagination;

    public Book $book;
    public array $chapters = [];
    public string $newChapterTitle = '';

    public function mount(Book $book)
    {
        $this->book = $book;
        $this->chapters = $book->chapters->map(function ($chapter) {
            return [
                'id' => $chapter->id,
                'title' => $chapter->title,
            ];
        })->toArray();
    }

    public function addChapter()
    {
        $this->validate([
            'newChapterTitle' => 'required|string|max:255',
        ]);

        $this->chapters[] = ['title' => $this->newChapterTitle, 'id' => null];
        $this->newChapterTitle = '';
    }

    public function removeChapter(int $index)
    {
        // If the chapter has an ID, it exists in the database and should be deleted
        if (isset($this->chapters[$index]['id'])) {
            Chapter::destroy($this->chapters[$index]['id']);
        }
        unset($this->chapters[$index]);
        $this->chapters = array_values($this->chapters); // Re-index the array
    }

    public function save()
    {
        // Validate the incoming chapters data
        $this->validate([
            'chapters.*.title' => 'required|string|max:255',
        ]);

        // Separate existing and new chapters
        $existingChapters = collect($this->chapters)->filter(fn($chapter) => isset($chapter['id']));
        $newChapters = collect($this->chapters)->filter(fn($chapter) => !isset($chapter['id']));

        // Get IDs of existing chapters that are being updated
        $incomingChapterIds = $existingChapters->pluck('id')->toArray();

        // Get IDs of chapters currently in the database
        $existingChapterIds = $this->book->chapters->pluck('id')->toArray();

        // Delete chapters that are in the database but not in the incoming data
        $chaptersToDelete = array_diff($existingChapterIds, $incomingChapterIds);
        Chapter::destroy($chaptersToDelete);

        // Update existing chapters
        foreach ($existingChapters as $chapterData) {
            $chapter = Chapter::find($chapterData['id']);
            if ($chapter) {
                $chapter->update(['title' => $chapterData['title']]);
            }
        }

        // Create new chapters
        foreach ($newChapters as $chapterData) {
            $this->book->chapters()->create(['title' => $chapterData['title']]);
        }

        $this->dispatch('bookUpdated');
    }


    public function render()
    {
        return view('livewire.edit-book-chapters');
    }
}
