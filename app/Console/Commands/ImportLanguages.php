<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Language;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ImportLanguages extends Command
{
    protected $signature = 'import:languages {file}';
    protected $description = 'Import languages from a given file';

    public function handle()
    {
        $filePath = $this->argument('file');

        if (!file_exists($filePath)) {
            $this->error("File not found: $filePath");
            return;
        }

        $file = fopen($filePath, 'r');
        if (!$file) {
            $this->error("Unable to open file: $filePath");
            return;
        }

        DB::transaction(function () use ($file) {
            while (($row = fgetcsv($file)) !== false) {
                if (count($row) < 2)
                    continue; // Ensure correct format

                Language::updateOrCreate(
                    ['abbreviation' => trim($row[0])],
                    ['name' => trim($row[1])]
                );
            }
        });

        fclose($file);
        $this->info("Languages imported successfully from $filePath");
    }
}
