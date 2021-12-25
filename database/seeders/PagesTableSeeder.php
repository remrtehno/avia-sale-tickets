<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pages = ['Privacy Policy', 'About Us', 'FAQ', 'Contact'];

        foreach ($pages as $page) {
            \App\Models\Pages::factory()->create([
                'title' => $page,
                'slug' => strtolower(preg_replace('/\s+/', '-', $page)),
            ]);
        }
    }
}
