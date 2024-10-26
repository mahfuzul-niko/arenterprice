<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->sentence(10),
            'slug' => fn($attributes) => Str::slug($attributes['product_name']),
            'brand_name' => $this->faker->company(),
            'price' => $this->faker->randomFloat(2, 10, 1000),  // Random price between 10 and 1000
            'unit' => $this->faker->randomElement(['pcs', 'kg', 'liters']),
            'quantity' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
