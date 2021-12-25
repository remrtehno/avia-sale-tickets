<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeatFlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $from = collect(['Vaclav Havel (PRG)', 'Tashkent (TAS)', 'Austria (AST)', 'India (IND)', 'Kazakhstan (KZH)']);
        $to = collect(['John F. Kennedy Intl. (JFK)', 'Domodedovo (MSK)', 'Prague (PRG)', 'Canada (CND)', 'Germany (GMN)']);

        $randDays = random_int(0, 31);


        return [
            'img' => 'http://placehold.it/370x232',
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(2, true),
            'content' => $this->faker->paragraph(5, true),
            'price' => rand(110, 2150),
            'flight_id' => rand(0, 150),
            'rating' => rand(0, 5),
            'intro_title' => $this->faker->sentence(1),
            'intro' => $this->faker->sentence(10),
            'from' => $from->random(),
            'to' => $to->random(),
            'date' => date('H:i:s', rand(1, 54000)),
            'timeDeparture' =>  date('H:i:s', rand(1, 54000)),
            'timeArrival' => date('H:i:s', rand(1, 54000)),

        ];
    }
}
