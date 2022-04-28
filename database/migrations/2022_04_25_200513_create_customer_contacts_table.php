<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $fields = [
            'name',
            'surname',
            'surname2',
            'email',
            'birthday',
            'gender',
            'passport_date',
            'passport_number',
            'citizenship',
            'tel',
            'visa',
            'address',
            'price',
            'type',
            'user_id'
        ];

        Schema::create('customer-contacts', function (Blueprint $table) use ($fields) {
            $table->id();
            $table->timestamps();

            foreach ($fields as $field) {
                $table->text($field)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer-contacts');
    }
}
