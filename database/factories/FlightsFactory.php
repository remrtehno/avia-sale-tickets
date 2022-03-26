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

        $date = now()->addDays(rand(0, 320))->addHours(rand(0, 15))->addMinute(0, 59);

        $count_chairs = rand(200, 300);
        $price_adult = rand(200, 300);
        $price_child = rand(200, 300);
        $price_infant = rand(200, 300);


        return [
            'flight' => $flights->random() . rand(10, 9999),
            'count_chairs' => $count_chairs,
            'price_adult' =>  $price_adult * 10950,
            'price_child' =>  $price_child * 9000,
            'price_infant' =>  $price_infant * 5000,
            'date' => $date->getTimestamp(),
            'date_arrival' => $date->addHours(rand(0, 15))->getTimestamp(),
            'comment' => "<p>Условия возврата: до вылета 5000UZS | после вылета 0UZS | вынужденный возврат 100% стоимости
             </p>
            <p>
            Условия перебронирования: до вылета 0UZS | после вылета 0UZS
            </p>
            <p>
               Норма багажа: 0КГ
             </p>
                <p>Ручная кладь: 0КГ</p>",
            'logo' =>  $logos->random(),
            'direction_from' => $direction_from->random(),
            'direction_to' => $direction_to->random(),
            'rating' => rand(0, 5),
        ];
    }
}
