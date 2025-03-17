<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
        'abbreviation'
    ];

    public function words()
    {
        return $this->belongsToMany(Word::class, 'word_language');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
