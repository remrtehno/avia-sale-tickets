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
        $flight = Str::random(3) . rand(10, 9999);

        $logos = collect(['/static/images/aviasales/FZ.svg', '/static/images/aviasales/HY.svg', '/static/images/aviasales/EK.svg', '/static/images/aviasales/KC.svg']);

        $direction_from = collect(['Vaclav Havel (PRG)', 'Tashkent (TAS)', 'Austria (AST)', 'India (IND)', 'Kazakhstan (KZH)']);
        $direction_to = collect(['John F. Kennedy Intl. (JFK)', 'Domodedovo (MSK)', 'Prague (PRG)', 'Canada (CND)', 'Germany (GMN)']);

        $date = now()->addDays(rand(0, 320))->addHours(rand(0, 15))->addMinute(0, 59)->getTimestamp();

        $count_chairs = rand(200, 300);
        $price_per_chair = rand(200, 300);

        return [
            'flight' => $flight,
            'count_chairs' =>  $count_chairs,
            'price_per_chair' =>  $price_per_chair,
            'total_purchased_price' => rand(30000, 50000),
            'total_sales_price' => $price_per_chair * $count_chairs,
            'date' => $date,
            'comment' => '',
            'logo' =>  $logos->random(),
            'direction_from' => $direction_from,
            'direction_to' => $direction_to,
        ];
    }
}
