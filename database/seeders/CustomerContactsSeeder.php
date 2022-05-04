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


        \App\Models\CustomerContacts::factory()->count(50)->create([
            'user_id' => $users->random()->id,
        ]);

        \App\Models\CustomerContacts::factory()->count(50)->create([
            'user_id' => $users->random()->id,
            'type' => collect(['CHD', 'INF'])->random(),
        ]);


        \App\Models\CustomerContacts::factory()->count(10)->create([
            'user_id' => 10,
        ]);
        \App\Models\CustomerContacts::factory()->count(10)->create([
            'user_id' => 12,
        ]);
        \App\Models\CustomerContacts::factory()->count(10)->create([
            'user_id' => 11,
        ]);

        \App\Models\CustomerContacts::factory()->count(10)->create([
            'user_id' => 10,
            'type' => 'CHD',
        ]);
        \App\Models\CustomerContacts::factory()->count(10)->create([
            'user_id' => 11,
            'type' => 'INF',
        ]);
    }
}
