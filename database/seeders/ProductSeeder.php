<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategory; 
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initialize Faker for generating random data
        $faker = Faker::create();

        // Create random categories (we can create, for example, 5 categories)
        $categories = [];
        for ($i = 0; $i < 5; $i++) {
            $categories[] = ProductCategory::create([
                'name' => $faker->word(),
            ]);
        }

        // Now create random products
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->word(),
                'description' => $faker->paragraph(),
                'price' => $faker->randomFloat(2, 10, 1000),
                'category_id' => $categories[array_rand($categories)]->id,
                'image_url' => $faker->imageUrl(),
            ]);
        }

        $this->command->info('Products and categories have been seeded.');
    }
}
