<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample categories to insert into the product_categories table
        $categories = [
            'Smartphones',
            'Laptops',
            'Cameras',
            'Accessories',
            'Wearables',
            'Gaming',
            'Home Appliances',
            'Furniture',
        ];

        // Loop through categories and insert them into the database
        foreach ($categories as $category) {
            ProductCategory::create([
                'name' => $category,
            ]);
        }

    }
}
