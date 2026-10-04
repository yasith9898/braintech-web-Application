<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'specifications',
        'sku',
        'brand',
        'model',
        'price',
        'currency',
        'image',
        'gallery',
        'category',
        'in_stock',
        'stock_quantity',
        'is_featured',
        'is_active',
        'order',
        'warranty',
        'weight',
        'dimensions',
    ];

    protected $casts = [
        'gallery' => 'array',
        'price' => 'decimal:2',
        'in_stock' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
