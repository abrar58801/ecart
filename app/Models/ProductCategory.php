<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    // Define the table name (optional if you're using the default plural form)
    protected $table = 'product_categories';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship between ProductCategory and Product
     * A category can have many products.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
