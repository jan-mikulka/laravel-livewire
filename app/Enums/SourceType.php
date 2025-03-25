<?php

namespace App\Enums;

enum SourceType: string
{
    case Idea = 'idea';
    case Book = 'book';
    case Article = 'article';
    case Video = 'video';
    case Audio = 'audio';
}
