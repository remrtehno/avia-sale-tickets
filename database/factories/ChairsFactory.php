<?php

namespace Database\Factories;

use App\Models\Chairs;
use App\Models\Flights;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChairsFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $flights = Flights::all();
        $flightOne = $this->faker->randomElement($flights);

        return [
            'flight_id' => $flightOne->id,
            'price' => rand(150, 700),
            'uuid' =>
            $flightOne->date->format('Y-m-d') .
                '-' . $flightOne->flight .
                '-' . 0,
        ];
    }
}
