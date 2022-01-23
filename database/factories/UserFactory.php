<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    /**
     * Individual.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function ind()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'ind',
                'birthday' => $this->faker->dateTimeBetween('1990-01-01', '2001-12-31')
                    ->format('Y-m-d H:m:s'),
                'surname' => $this->faker->firstName(),
                'surname2' => $this->faker->lastName(),
                'passport_file' => null
            ];
        });
    }

    /**
     * Organiztion.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function org()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'org',
                'dir_surname' => $this->faker->firstName(),
                'dir_name' => $this->faker->lastName(),
                'dir_surname2' => $this->faker->firstNameMale(),
                'dir_passport_file' => null,
                'tel_director' => $this->faker->phoneNumber(),
                'inn' => rand(11111111, 99999999),
                'inn_file' => null,
                'license' => rand(11111111, 99999999),
                'license_file' => null,
                'agreement_contract' => rand(11111111, 99999999),
                'agreement_contract_file' => null,
                'cadastre' => rand(11111111, 99999999),
                'cadastre_file' => null,
            ];
        });
    }
    /**
     * User Admin.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function isApproved()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_approved' => 1,
            ];
        });
    }

    /**
     * User approved.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function isAdmin()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_admin' => 1,
            ];
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'address' => $this->faker->address(),
            'tel' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),

            'role' => '',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'is_admin' => 0,
            'is_approved' => 0,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
