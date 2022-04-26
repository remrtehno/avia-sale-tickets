<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::all();


        \App\Models\CustomerContacts::factory()->count(75)->create([
            'user_id' => $users->random()->id
        ]);
    }
}
