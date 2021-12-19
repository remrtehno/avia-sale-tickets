<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeatFlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img' => 'http://placehold.it/370x232',
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(2, true),
            'content' => $this->faker->paragraph(5, true),
            'price' => rand(110, 2150),
            'flight_id' => rand(0, 150),
            'rating' => rand(0, 5),
            'intro_title' => $this->faker->sentence(1),
            'intro' => $this->faker->sentence(10),
        ];
    }
}
