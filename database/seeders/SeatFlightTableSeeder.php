<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;

class SeatFlightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //clean directory
        $file = new Filesystem;
        $file->cleanDirectory(public_path('/static/mock/'));
        \App\Models\SeatFlight::factory(30)->create();
    }
}
