<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'value',
        'unit',
        'icon',
        'is_visible',
    ];
}
