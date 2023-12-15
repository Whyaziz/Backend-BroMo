<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuhuKelembabanSensors>
 */
class SuhuKelembabanSensorsFactory extends Factory
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
            "id_kandang"=> 1,
            "suhu"=> $this->faker->numberBetween(10,40),
            "kelembaban"=> $this->faker->numberBetween(10,30),
        ];
    }
}
