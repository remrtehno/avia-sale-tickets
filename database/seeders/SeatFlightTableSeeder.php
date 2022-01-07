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

        $file = new Filesystem;
        $path = public_path('/static/mock/');

        if ($file->exists($path)) {
            //clean directory
            $file->cleanDirectory($path);
        } else {
            $file->makeDirectory($path);
        }

        \App\Models\SeatFlight::factory(90)->create();
    }
}
