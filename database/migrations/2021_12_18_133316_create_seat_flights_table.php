<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seat_flights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('img');
            $table->string('title');
            $table->string('intro_title');
            $table->text('intro');
            $table->text('description');
            $table->text('content');
            $table->integer('price');
            $table->integer('flight_id');
            $table->integer('rating');
            $table->text('from');
            $table->text('to');
            $table->timestamp('date');
            $table->timestamp('timeDeparture');
            $table->timestamp('timeArrival');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seat_flights');
    }
}
