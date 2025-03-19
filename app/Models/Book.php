<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'isbn', 'author'];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function words()
    {
        return $this->belongsToMany(Word::class, 'book_word');
    }
}
