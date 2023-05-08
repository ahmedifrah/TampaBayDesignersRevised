<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'is_slack' => fake()->boolean(),
            'is_credit' => fake()->boolean(),
            'name' => fake()->sentence(),
            'icon' => fake()->sentence()
        ];
    }
}
