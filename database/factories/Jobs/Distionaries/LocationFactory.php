<?php

namespace Database\Factories\Jobs\Distionaries;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobs\Distionaries\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'title' => fake()->randomElement(['office', 'remote', 'mixed'])
        ];
    }
}