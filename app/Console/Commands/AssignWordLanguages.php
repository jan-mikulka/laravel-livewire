<?php

namespace App\Console\Commands;

use App\Models\Word;
use App\Models\Language;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Log;

class AssignWordLanguages extends Command
{
    protected $signature = 'words:assign-languages';
    protected $description = 'Assigns languages to words based on abbreviations in content.';

    public function handle()
    {
        $this->info('Starting language assignment...');

        $bar = $this->output->createProgressBar(Word::count());
        $bar->start();


        Word::chunk(100, function ($words) use ($bar) {
            foreach ($words as $word) {
                Log::info($word->name);
                // Log::info($word->content);
                $abbreviations = $this->extractAbbreviations($word->content);
                Log::info(collect($abbreviations)->join(', '));
                $languages = Language::whereIn('abbreviation', $abbreviations)->get();

                $word->languages()->sync($languages->pluck('id')->toArray());

                $bar->advance();
            }
        });

        $bar->finish();
        $this->info("\nLanguage assignment complete.");
    }

    protected function extractAbbreviations(string $content): array
    {
        $words = explode(' ', $content); // Split the content into words
        $abbreviations = [];

        foreach ($words as $word) {
            // Check if the word ends with a dot (.) and is longer than 1 character.
            if (Str::endsWith($word, '.') && strlen($word) > 1) {
                $abbreviations[] = $word;
            }
        }

        return array_unique($abbreviations);
    }




    protected function extractAbbreviations2(string $content): array
    {
        //Improved regex to handle abbreviations with or without periods and spaces
        preg_match_all('/\b[A-Z]{2,}\b(?:\.[A-Z]{0,2})?\b/', $content, $matches);

        return array_unique(array_map('strtolower', $matches[0] ?? []));
    }
}
