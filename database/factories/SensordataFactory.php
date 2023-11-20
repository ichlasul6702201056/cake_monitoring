<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sensordata>
 */
class SensordataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-30 day');
        return [
            'created_at' => $date,
            'humid_1' => $this->faker->randomFloat(2, 40, 100),
            'humid_2' => $this->faker->randomFloat(2, 40, 100),
            'humid_3' => $this->faker->randomFloat(2, 40, 100),
            'temperature_1' => $this->faker->randomFloat(2, 40, 100),
            'temperature_2' => $this->faker->randomFloat(2, 40, 100),
            'temperature_3' => $this->faker->randomFloat(2, 40, 100),
            'gas_1' => $this->faker->numberBetween(200, 800),
            'gas_2' => $this->faker->numberBetween(200, 800),
            'gas_3' => $this->faker->numberBetween(200, 800),
        ];
    }
}
