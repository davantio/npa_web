<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'vision',
        'mission',
        'founded_year',
        'address',
        'email',
        'phone',
        'website',
        'logo',
    ];
}
