<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'application',
        'packaging',
        'datasheet_file',
        'is_visible',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
