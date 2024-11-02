<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Order::class;

    public function definition()
    {
        // Generate a random date within the last 12 months
        $randomDate = $this->faker->dateTimeBetween('-12 months', 'now');

        return [
            'user_id' => $this->faker->numberBetween(1, 10), // Assuming 10 users
            'author' => 2, // Set the author as 2
            'unique_id' => $this->faker->uuid(),
            'total_price' => $this->faker->numberBetween(100, 1000),
            'paid_price' => $this->faker->numberBetween(50, 1000),
            'due' => 0, // Calculating due
            'date' => $randomDate,
            'created_at' => $randomDate, // Set created_at to the same random date
            'updated_at' => $randomDate, // Optional: Set updated_at to match created_at
        ];
    }
    public function configure()
    {
        return $this->afterMaking(function (Order $order) {
            // Ensure due is calculated correctly based on total_price and paid_price
            $order->due = $order->total_price - $order->paid_price;
        });
    }

}
