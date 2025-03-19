<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use HasFactory;

    protected $fillable = ['chapter_id', 'content'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function words()
    {
        return $this->belongsToMany(Word::class, 'statement_word');
    }
}
