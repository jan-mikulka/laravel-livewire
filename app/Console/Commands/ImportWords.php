<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Word;
use Illuminate\Support\Facades\File;

class ImportWords extends Command
{
    protected $signature = 'import:words {filepath}';
    protected $description = 'Import text blocks from a file into the database';

    public function handle()
    {
        $filePath = $this->argument('filepath');

        if (!File::exists($filePath)) {
            $this->error("File not found: $filePath");
            return;
        }

        $content = File::get($filePath);

        // Split text by two or more newlines (paragraph separation)
        $blocks = preg_split('/\n\s*\n/', $content, -1, PREG_SPLIT_NO_EMPTY);

        foreach ($blocks as $block) {
            $trimmedBlock = trim($block);
            $words = preg_split('/\s+/', $trimmedBlock); // Split by spaces
            $firstWord = $words[0] ?? 'Unnamed'; // Get the first word or default to "Unnamed"

            Word::create([
                'name' => $firstWord,
                'content' => $trimmedBlock
            ]);
        }

        $this->info(count($blocks) . " text blocks imported successfully.");
    }
}
