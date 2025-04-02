<?php

namespace App\Livewire\Traits;

use App\Models\Source;

trait SearchableSources
{
    public function searchSources(string $value = '')
    {
        return Source::where('name', 'like', "%$value%")
            ->take(10)
            ->orderByDesc('created_at')
            ->get();
    }
}
