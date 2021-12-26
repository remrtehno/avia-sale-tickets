<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //social links
            $table->string('facebook');
            $table->string('twitter');
            $table->string('google_plus');
            $table->string('instagram');

            //header
            $table->string('email_header');
            $table->string('phone_header');

            //footer
            $table->string('phone_footer');
            $table->string('email_footer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
