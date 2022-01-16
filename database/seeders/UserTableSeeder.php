<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->count(2)->isApproved()->org()->create();
        \App\Models\User::factory()->count(2)->org()->create();

        \App\Models\User::factory()->count(2)->isApproved()->ind()->create();
        \App\Models\User::factory()->count(2)->ind()->create();

        //admin
        \App\Models\User::factory()->count(1)->ind()->isAdmin()->isApproved()->create([
            'email' => 'admin@example.com',
        ]);
    }
}
