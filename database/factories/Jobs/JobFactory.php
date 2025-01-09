<?php

namespace Database\Factories\Jobs;

use App\Models\Employer;
use App\Models\Jobs\Distionaries\Currency;
use App\Models\Jobs\Distionaries\Location;
use App\Models\Jobs\Distionaries\Payment;
use App\Models\Jobs\Distionaries\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobs\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'type_id' => Type::factory(0),
            'location_id' => Location::factory(0),
            'currency_id' => Currency::factory(0),
            'payment_id' => Payment::factory(0),
            'title' => fake()->jobTitle(),
            'salary' => fake()->randomFloat(0, 10, 100),
            'description' => fake()->sentence(nbWords: 12),
            'requirements' => fake()->paragraph(rand(3, 10)),
            'duties' => fake()->paragraph(rand(4, 10)),
            'featured' => fake()->boolean(),
            'closed' => false
        ];
    }
}
