<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;

class FlightsTableSeeder extends Seeder
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

        $flights = \App\Models\Flights::factory(20)->create();

        $logos = collect([
            'https://raw.githubusercontent.com/remrtehno/avia-sale-tickets/1d4aaf98150b5ab99951462849b879d427a22e8e/public/static/images/aviasales/EK.svg',
            'https://raw.githubusercontent.com/remrtehno/avia-sale-tickets/1d4aaf98150b5ab99951462849b879d427a22e8e/public/static/images/aviasales/FZ.svg',
            'https://raw.githubusercontent.com/remrtehno/avia-sale-tickets/1d4aaf98150b5ab99951462849b879d427a22e8e/public/static/images/aviasales/EK.svg',
            'https://raw.githubusercontent.com/remrtehno/avia-sale-tickets/1d4aaf98150b5ab99951462849b879d427a22e8e/public/static/images/aviasales/KC.svg'
        ]);

        foreach ($flights as  $flight) {
            $nameCollection = $flight->getPathImages('logo');

            $flight->clearMedia($nameCollection);

            $flight->addMediaFromUrl($logos->random())
                ->toMediaCollection($nameCollection);
        }
    }
}
