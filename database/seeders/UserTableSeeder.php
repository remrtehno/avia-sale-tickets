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

        \App\Models\User::factory()->ind()->create([
            'email' => 'ind2@example.com',
            'name' => 'Individual2'
        ]);

        //ind
        \App\Models\User::factory()->isApproved()->ind()->create([
            'email' => 'ind@example.com',
            'name' => 'Individual'
        ]);

        //org
        \App\Models\User::factory()->isApproved()->org()->create([
            'email' => 'org@example.com',
            'name' => 'Organization'
        ]);

        //admin
        \App\Models\User::factory()->ind()->isAdmin()->isApproved()->create([
            'email' => 'admin@example.com',
            'name' => 'Admin'
        ]);

        \App\Models\User::factory()->count(1)->org()->create([
            'email' => 'test@example.com',
            'name' => 'test',
        ]);
    }
}
