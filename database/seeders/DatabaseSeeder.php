<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Ingredient;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Membuat beberapa produk
        $products = Product::factory(10)->create();

        // Membuat beberapa bahan dan menghubungkannya dengan produk
        $products->each(function ($product) {
            $ingredients = Ingredient::factory(5)->create();
            $product->ingredients()->attach(
                $ingredients->pluck('id')->toArray(),
                ['quantity' => rand(1, 100)]
            );
        });

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
