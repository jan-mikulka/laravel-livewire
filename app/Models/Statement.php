<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Statement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'source_id', 'content', 'page', 'time'];

    public function getTimeAttribute($value)
    {
        if (is_null($value))
            return null;
        // If already numeric, cast to mm:ss
        return gmdate("i:s", $value); // e.g., 125 -> 02:05
    }

    public function setTimeAttribute($value)
    {
        if (is_null($value))
            return null;
        // If input is already numeric (e.g., from seeder), just store
        if (is_numeric($value)) {
            $this->attributes['time'] = $value;
            return;
        }

        // Otherwise, assume it's a string like "02:05"
        [$minutes, $seconds] = explode(':', $value);
        $this->attributes['time'] = ((int) $minutes * 60) + (int) $seconds;
    }

    public function words()
    {
        return $this->belongsToMany(Word::class, 'statement_word');
    }

    /**
     * Get the source that owns the Statement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }
}
