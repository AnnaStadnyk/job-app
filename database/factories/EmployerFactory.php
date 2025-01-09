<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'code' => uniqid(),
            'title' => fake()->company(),
            'address' => fake()->address(),
            // 'code' => (string) random_int(10000, 20000),
            'image' => fake()->imageUrl(),
            'url' => fake()->url()
        ];
    }
}
