<?php

namespace Database\Factories;

use App\Models\GaragesOwner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GaragesOwner>
 */
class GaragesOwnerFactory extends Factory
{
    protected $model = GaragesOwner::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->name(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
