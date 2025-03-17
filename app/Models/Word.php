<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'content', 'language_id'];


    public function languages()
    {
        return $this->belongsToMany(Language::class, 'word_language');
    }

}
