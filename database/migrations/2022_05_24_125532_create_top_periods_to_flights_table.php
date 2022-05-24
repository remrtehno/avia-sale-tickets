<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopPeriodsToFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_periods_to_flights', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->integer('top_report_id');
            $table->integer('flight_id');
            $table->timestamp('period')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_reports_to_flights');
    }
}
