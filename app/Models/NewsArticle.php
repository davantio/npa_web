<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    use HasFactory;

    protected $casts = [
        'is_visible' => 'boolean',
    ];
    
    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'published_at',
        'is_visible',
    ];
}
