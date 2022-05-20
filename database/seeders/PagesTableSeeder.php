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

        $pages = ['Политика конфидециальности', 'О проекте', 'FAQ', 'Форма для жалоб и предложений', 'Наши партнеры'];

        foreach ($pages as $page) {
            \App\Models\Pages::factory()->create([
                'title' => $page,
                'slug' => strtolower(preg_replace('/\s+/', '-', $page)),
            ]);
        }
    }
}
