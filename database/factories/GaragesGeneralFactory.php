<?php

namespace Database\Factories;

use App\Models\GaragesOwner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GaragesGeneral>
 */
class GaragesGeneralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->name(),
            'owner_id' => GaragesOwner::factory(),
            'currency' => fake()->currencyCode(),
            'hourly_price' => fake()->randomFloat(2, 0, 1000),
            'country' => fake()->country(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
        ];
    }
}
