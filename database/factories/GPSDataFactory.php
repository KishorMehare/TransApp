<?php

namespace Database\Factories;
use App\Models\GPSData;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GPSData>
 */
class GPSDataFactory extends Factory
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
            'gps_id' => rand(10001,99999),
            'vehicle_id' => rand(1,2),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'timestamp' => $this->faker->dateTimeBetween('-1 week', 'now'),

        ];
    }
}
