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
            // order
            // $table->foreignId('order_id')
            //     ->constrained()
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');

            // booking
            // $table->foreignId('booking_id')
            //     ->constrained()
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');

            $table->integer('price');
            $table->string('uuid');
            $table->string('status')->nullable();
            $table->integer('booking_id')->nullable();
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
