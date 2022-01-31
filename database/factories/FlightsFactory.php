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
        $flights =  collect(['HY-', 'HY-', 'KC-', 'SU-', 'EZ-']);

        $logos = collect(['/static/images/aviasales/FZ.svg', '/static/images/aviasales/HY.svg', '/static/images/aviasales/EK.svg', '/static/images/aviasales/KC.svg']);

        $direction_from = collect(['Vaclav Havel (PRG)', 'Tashkent (TAS)', 'Austria (AST)', 'India (IND)', 'Kazakhstan (KZH)']);
        $direction_to = collect(['John F. Kennedy Intl. (JFK)', 'Domodedovo (MSK)', 'Prague (PRG)', 'Canada (CND)', 'Germany (GMN)']);

        $date = now()->addDays(rand(0, 320))->addHours(rand(0, 15))->addMinute(0, 59)->getTimestamp();

        $count_chairs = rand(200, 300);
        $price_adult = rand(200, 300);
        $price_child = rand(200, 300);
        $price_infant = rand(200, 300);


        return [
            'flight' => $flights->random() . rand(10, 9999),
            'count_chairs' =>  $count_chairs,
            'price_adult' =>  $price_adult,
            'price_child' =>  $price_child,
            'price_infant' =>  $price_infant,
            'total_purchased_price' => rand(30000, 50000),
            'total_sales_price' => $count_chairs * $count_chairs,
            'date' => $date,
            'date_arrival' => $date,
            'comment' => '',
            'logo' =>  $logos->random(),
            'direction_from' => $direction_from->random(),
            'direction_to' => $direction_to->random(),
            'rating' => rand(0, 5),
        ];
    }
}
