<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipement>
 */
class EquipementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'manufacturer' => fake()->word(),
            'model' => fake()->word(),
            'section_id' => 1,
            'serial' => fake()->unique()->word(),
            'description' => fake()->paragraph(),
            'status' => fake()->boolean(),
        ];
    }
}
