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

        return [
            'chairsable_type' => 'App\Models\Flights',
        ];
    }
}
