<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\InteractsWithTime;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class FlightsFactory extends Factory
{
    use InteractsWithTime;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $from = collect(['Vaclav Havel (PRG)', 'Tashkent (TAS)', 'Austria (AST)', 'India (IND)', 'Kazakhstan (KZH)']);
        $to = collect(['John F. Kennedy Intl. (JFK)', 'Domodedovo (MSK)', 'Prague (PRG)', 'Canada (CND)', 'Germany (GMN)']);
        $classes = collect(['Business - C', 'Economy - B', 'Economy - G', 'Business - A']);



        $date = now()->addDays(rand(0, 320))->addHours(rand(0, 15))->addMinute(0, 59)->getTimestamp();
        $time_departure = now()->addHours(rand(0, 5))->getTimestamp();
        $time_returning = now()->addHours(rand(5, 10))->addMinute(0, 59)->getTimestamp();

        //create images
        $path = '/static/mock/' . Str::random(10) . '.jpg';
        Image::make('https://picsum.photos/370/232?random=12965')->save(public_path($path));

        return [
            //text
            'title' => Str::random(2) . random_int(1000, 9999),
            'from' => $from->random(),
            'to' => $to->random(),
            'class' => $classes->random(),
            'chairs' => random_int(200, 500),
            'price_per_chair' => random_int(1200, 1500),
            ''


            //meta data
            'img' =>  $path,
            'price' => rand(110, 2150),
            'adult' => rand(0, 50),
            'child' => rand(0, 10),
            'infant' => rand(0, 10),
            'flight_id' => rand(0, 150),
            'rating' => rand(0, 5),
            'date' => $date,
            'departure' => $time_departure,
            'returning' => $time_returning,

        ];
    }
}
