<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    //Untuk memastikan agar is_visible adalah boolean
    //Karena beberapa hosting membacanya menjadi string
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'description',
        'icon',
        'is_visible',
    ];
}
