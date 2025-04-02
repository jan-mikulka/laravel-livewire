<?php

use App\Models\Source;
use App\Livewire\Traits\SearchableSources;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns sources matching the search query', function () {
    // Use the trait in a test class
    $searchable = new class {
        use SearchableSources;
    };

    // Create test data
    Source::factory()->create(['name' => 'Test Source 1']);
    Source::factory()->create(['name' => 'Another Source']);
    Source::factory()->create(['name' => 'Test Source 2']);

    // Call the searchSources method
    $results = $searchable->searchSources('Test');

    // Assert the results
    expect($results)->toHaveCount(2);
    expect($results->pluck('name'))->toContain('Test Source 1', 'Test Source 2');
});