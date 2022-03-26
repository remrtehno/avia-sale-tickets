<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MetaInfoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $template_comment = "
        <p>Условия возврата: до вылета 0UZS | после вылета 0UZS | вынужденный возврат 100% стоимости
        </p>
        <p>
          Условия перебронирования: до вылета 0UZS | после вылета 0UZS
        </p>
        <p>
          Норма багажа: 0КГ
        </p>
        <p>Ручная кладь: 0КГ</p>";

    \App\Models\MetaInfo::factory()->create([
      'meta_name' => 'flight_comment',
      'meta_content' => $template_comment
    ]);
  }
}
