<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table name (optional if you are using the default plural form)
    protected $table = 'products';

    // Allow mass assignment for the following attributes
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image_url',
    ];

    /**
     * Define the relationship between Product and ProductCategory
     * Each product belongs to one category.
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
