<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\AdminPosition;
use App\Models\OrganizationPosition;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Random role
        $role = $this->faker->randomElement(['Admin', 'Student Officer']);

        // Conditionally assign organization_id if the role is 'Student Officer'
        $organization = $role === 'Student Officer' ? Organization::inRandomOrder()->value('name') : null;

        $position = $role === 'Admin' ? AdminPosition::inRandomOrder()->value('name') : OrganizationPosition::inRandomOrder()->value('name');

        return [
            'role' => $role,
            'organization' => $organization,
            'position' => $position,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('123'),
            // 'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
