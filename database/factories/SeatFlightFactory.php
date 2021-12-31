<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\InteractsWithTime;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class SeatFlightFactory extends Factory
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

        $html_content = "
        <ul>
            <li>From Vaclav Havel (PRG)</li>
            <li>To Schiphol (AMS)</li>
            <li>KLM 1356</li>
            <li>BOEING 737-800 (WINGLETS) PASSENGER | Snack</li>
            <li>Economy/Coach (L)</li>
            <li><a href=\"#\">Preview availability</a></li>
            <li>Total distance: 439 mi</li>
            <li><b>1h 20m stop / in Amsterdam (AMS)</b></li>
        </ul>
        ";

        $date = now()->addDays(rand(0, 120))->addHours(rand(0, 15))->addMinute(0, 59)->getTimestamp();
        $time_departure = now()->addHours(rand(0, 5))->getTimestamp();
        $time_returning = now()->addHours(rand(5, 10))->addMinute(0, 59)->getTimestamp();

        //create images
        $path = '/static/mock/' . Str::random(10) . '.jpg';
        Image::make('https://picsum.photos/370/232?random=12965')->save(public_path($path));

        return [
            //text
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(2),
            'content' => $html_content . $this->faker->paragraph(5),
            'intro_title' => $this->faker->sentence(1),
            'intro' => $this->faker->sentence(10),
            'from' => $from->random(),
            'to' => $to->random(),

            //meta data
            'img' =>  $path,
            'price' => rand(110, 2150),
            'flight_id' => rand(0, 150),
            'rating' => rand(0, 5),
            'date' => $date,
            'departure' => $time_departure,
            'returning' => $time_returning,

        ];
    }
}
