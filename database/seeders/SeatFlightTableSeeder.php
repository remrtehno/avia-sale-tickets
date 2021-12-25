<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeatFlightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SeatFlight::factory(30)->create();
    }
}
