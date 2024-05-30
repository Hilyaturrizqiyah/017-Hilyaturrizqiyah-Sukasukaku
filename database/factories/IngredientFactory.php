<?php

namespace Database\Factories;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Ingredient::class;

    public function definition(): array
    {
        return [
            'ingredient_name' => $this->faker->word,
            'ingredient_price' => $this->faker->numberBetween(500, 10000),
            'unit' => $this->faker->randomElement(['g', 'kg', 'ml', 'l']),
            'image' => $this->faker->imageUrl(640, 480, 'food', true),
            'ingredient_photo' => $this->faker->image,
        ];
    }
}
