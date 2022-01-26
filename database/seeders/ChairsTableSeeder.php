<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Chairs::factory(600)->create();
    }
}
