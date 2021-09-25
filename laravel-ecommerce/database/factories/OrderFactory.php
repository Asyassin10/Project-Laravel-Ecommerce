<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'qentity' => $this->faker->numberBetween($int1 = 1, $int2 = 100),
            'product_name' => $this->faker->name(),
            'price' => $this->faker->numberBetween($int1 = 1, $int2 = 100),
            'price_total' => $this->faker->numberBetween($int1 = 1, $int2 = 2000),
            'paid' => $this->faker->boolean(),
            'delivered' => $this->faker->boolean(),
            'user_id' => $this->faker->numberBetween($int1 = 1, $int2 = 10),

        ];
    }
}