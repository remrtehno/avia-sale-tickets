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

        $types = collect([Chairs::ADULT, Chairs::CHILD, Chairs::INFANT]);

        return [
            'flight_id' => $flightOne->id,
            'chairsable_id' => $flightOne->id,
            'chairsable_type' => 'App\Models\Flights',
            'price' => rand(150, 700),
            'type' => $types->random(),
            'uuid' =>
            $flightOne->date->format('Y-m-d') .
                '-' . $flightOne->flight .
                '-' . 0,
        ];
    }
}
