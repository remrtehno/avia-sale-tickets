<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $email = $this->faker->unique()->safeEmail();

        return [
            'email_header' =>  "<a href='mailto:$email'>$email</a>",
            'email_footer' =>  "<a href='mailto:$email'>$email</a>",

            'phone_header' => '(90) 979-33-54',
            'phone_footer' => '(90) 979-33-54',

            'facebook' => 'https://facebook.com/',
            'twitter' => 'https://twitter.com/',
            'google_plus' => 'https://google.com/',
            'instagram' => 'https://instagram.com/'

        ];
    }
}
