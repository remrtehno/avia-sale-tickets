<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerContactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'surname2' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'birthday' => $this->faker->dateTimeBetween('1990-01-01', '2001-12-31')
                ->format('m-d-Y'),
            'gender' => collect(['f', 'm'])->random(),
            'passport_date' => $this->faker->dateTimeBetween('2007-01-01', '2021-12-31')
                ->format('m-d-Y'),
            'passport_number' => 'AA' . rand(11111111, 99999999),
            'citizenship' => 'UZB',
            'tel' => '+9989' . rand(00000001, 100000001),
            'visa' => rand(00000001, 100000001),
            'address' => $this->faker->address(),
            'type' => 'ADT'
        ];
    }
}
