<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FleetVehicle>
 */
class FleetVehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_number' => fake()->bothify('??-######'),
            'km_driven' => fake()->numberBetween(0, 3000),
            'total_drive_time_in_minutes' => fake()->numberBetween(0, 9000),
            'max_tonnage_kg' => fake()->numberBetween(100, 2000),
            'status' => fake()->boolean(),
            'last_driven_date' => fake()->dateTimeBetween('-3 months')
        ];
    }

    public function underused()
    {
        return $this->state(function (array $attributes) {
            return [
                'km_driven' => fake()->numberBetween(0, 300),
                'total_drive_time_in_minutes' => fake()->numberBetween(0, 500),
            ];
        });
    }

    public function normal()
    {
        return $this->state(function (array $attributes) {
            return [
                'km_driven' => fake()->numberBetween(301, 2000),
                'total_drive_time_in_minutes' => fake()->numberBetween(501, 7000),
            ];
        });
    }

    public function overused()
    {
        return $this->state(function (array $attributes) {
            return [
                'km_driven' => fake()->numberBetween(2001, 3000),
                'total_drive_time_in_minutes' => fake()->numberBetween(7001, 9000),
            ];
        });
    }
}
