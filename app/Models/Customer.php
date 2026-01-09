<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $casts = [
        'is_visible' => 'boolean',
    ];
    
    protected $fillable = [
        'name',
        'logo',
        'website',
        'description',
        'is_visible',
    ];
}
