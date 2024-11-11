<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActivityForm>
 */
class ActivityFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'created_by' => fake()->randomElement([1]),
            'status' => fake(),
            'check_payment_or_cash' => false,
            'food' => false,
            'supplies' => false,
            'reproduction' => false,
            'others' => false,
            'date' => fake()->date(),
            'from_time' => fake()->time(),
            'to_time' => fake()->time(),
            'attendance_count' => fake()->numberBetween(1, 5000),
            'event_type' => fake()->event(),
            'venue' => fake()->venue(),
            'requirements_or_resources_needed' => fake()->sentence(),
            'title' => fake()->sentence(),
            'description' => fake()->sentence,
            'participant' => fake()->sentence(),
            'payment_or_cash_file' => null,
            'food_file' => null,
            'supplies_file' => null,
            'reproduction_file' => null,
            'others_file' => null,
            'college_dean_status' => 'PENDING',
            'osa_status' => 'PENDING',
            'vpaa_status' => 'PENDING',
            'vpa_status' => 'PENDING',
        ];
    }
}
