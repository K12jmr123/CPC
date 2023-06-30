<?php

namespace Database\Factories;

use App\Models\record;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\record>
 */
class recordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */protected $model = record::class;
    public function definition(): array
    {
        return [
            'Firstname' => $this->faker->firstName(),
            'Lastname' => $this->faker->lastName(),
            'Section' => $this->faker->numberBetween(1, 4) . $this->faker->randomElement(['A', 'B', 'C', 'D']),

        ];
    }
}