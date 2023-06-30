<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;
    public function definition(): array
    {
        return [
            'Firstname' => $this->faker->firstName(),
            'Lastname' => $this->faker->lastName(),
            'Section' => $this->faker->numberBetween(1, 4) . $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'email' => $this->faker->userName,
            'password' => "1234",
            'role' => $this->getRole(),
        ];
    }

    private function getRole()
    {
        static $adminCreated = false;
        static $userCount = 0;

        if (!$adminCreated) {
            $adminCreated = true;
            return 'admin';
        }

        if ($userCount < 5) {
            $userCount++;
            return 'users';
        }

        return 'users';
    }
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}