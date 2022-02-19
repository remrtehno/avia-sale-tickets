<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('type');

            $table->string('name');
            $table->string('surname');
            $table->string('surname2')->nullable();
            $table->string('email');
            $table->string('birthday');
            $table->string('gender');
            $table->string('passport_date');
            $table->string('passport_number');
            $table->string('citizenship');
            $table->string('tel');
            $table->string('visa')->nullable();
            $table->string('address')->nullable();

            $table->string('price')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
