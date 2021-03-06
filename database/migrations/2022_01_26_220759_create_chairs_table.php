<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chairs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            //flight
            $table->foreignId('flight_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('chairsable_id');

            $table->string("chairsable_type");

            $table->string('uuid');
            $table->string('status')->nullable();
            $table->integer('booking_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('seller_id');
            $table->integer('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chairs_booking_id_foreign');
        Schema::dropIfExists('chairs');
    }
}
