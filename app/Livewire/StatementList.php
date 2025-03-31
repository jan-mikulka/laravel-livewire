<?php

namespace App\Livewire;

use App\Models\Statement;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Manage Statements')]
class StatementList extends AdminComponent
{
    use WithPagination;

    #[Computed]
    public function headers(): array
    {
        return [
            ['key' => 'title', 'label' => 'Title', 'sortable' => true],
            ['key' => 'content', 'label' => 'Content', 'sortable' => true],
            [
                'key' => 'source.name',
                'label' => 'Source',
                'sortable' => true,
                'format' => fn($row, $field) => $row->source?->name,
            ],
            ['key' => 'created_at', 'label' => 'Created At', 'sortable' => true],
        ];
    }

    public function delete(Statement $statement)
    {
        $statement->delete();
    }

    public function mount()
    {
        // Restore last page from session
        $lastPage = session('last_page_' . static::class, 1);
        $this->setPage($lastPage);
    }

    public function render()
    {
        $query = Statement::query()->with('source')->latest(); // Order by latest created

        return view('livewire.statement-list', [
            'statements' => $query->paginate(10),
        ]);
    }

    public function updatingPage($page)
    {
        // Store the current page in session
        session()->put('last_page_' . static::class, $page);
    }
}
