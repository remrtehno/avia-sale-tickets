<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraph(12, true),
        ];
    }
}
