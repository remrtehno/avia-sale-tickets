<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $flights = \App\Models\Flights::all();

        $flights->each(function (\App\Models\Flights $flight) {
            \App\Models\Chairs::factory(rand(50, 600))->create([
                'flight_id' => $flight->id,
                'chairsable_id' => $flight->id,
                'uuid' =>
                $flight->date->format('Y-m-d') .
                    '-' . $flight->flight .
                    '-' . 0,
                'seller_id' => $flight->user_id
            ]);
        });
    }
}
