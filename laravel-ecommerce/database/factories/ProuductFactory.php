<?php

namespace Database\Factories;

use App\Models\Prouduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProuductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prouduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titale' => $this->faker->title(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween($int1 = 1, $int2 = 100),
            'old_price' => $this->faker->numberBetween($int1 = 1, $int2 = 100),
            'in_stock' => $this->faker->numberBetween($int1 = 1, $int2 = 100),
            'picture' => $this->faker->imageUrl($width = 640, $height = 480),
            'categories_id' => $this->faker->numberBetween($int1 = 1, $int2 = 10),

        ];
    }
}