<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_payments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->timestamp('date');
            $table->string('sum');
            $table->integer('flight_id');
            $table->integer('seller_id');
            $table->integer('customer_id');
            $table->string('tariff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_services');
    }
}
