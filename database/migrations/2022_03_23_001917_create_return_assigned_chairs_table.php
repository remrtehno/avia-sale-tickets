<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnAssignedChairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_assigned_chairs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('owner_id');
            $table->integer('flight_id');
            $table->integer('count_chairs');
            $table->integer('order_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('return_assigned_chairs');
    }
}
