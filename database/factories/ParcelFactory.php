<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parcel>
 */
class ParcelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->randomNumber(8),
            'price' => $this->faker->numberBetween(100, 1000),
            'address' => $this->faker->address,
            'number_of_items' => $this->faker->numberBetween(1, 10),
            'comment' => $this->faker->sentence,
        ];
    }
}
