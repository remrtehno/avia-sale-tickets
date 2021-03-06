<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('uuid');
            $table->integer('seller_id');
            $table->integer('user_id')->nullable();
            $table->integer('booking_id');
            $table->integer('flight_id');
            $table->integer('total');
            $table->string('status');
            $table->integer('exchange_rate');
            $table->integer('price_adult');
            $table->integer('count_chairs');
            $table->integer('user_returned_id')->nullable();
            $table->integer('is_returned')->nullable();
            $table->integer('is_completed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
