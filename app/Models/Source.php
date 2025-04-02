<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\SourceType;

class Source extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'url',
        'author',
        'domain',
    ];

    protected $casts = [
        'type' => SourceType::class,
    ];

}
