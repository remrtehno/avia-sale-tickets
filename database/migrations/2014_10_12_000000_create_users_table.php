<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->string('address');
            $table->string('tel');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('role')->nullable()->comment('ind=Individual, org=Organization');
            $table->integer('is_admin');
            $table->integer('is_approved');

            //IND
            $table->timestamp('birthday')->nullable();
            $table->string('surname')->nullable();
            $table->string('surname2')->nullable();
            $table->text('passport_file')->nullable();

            //ORG
            $table->string('dir_surname')->nullable();
            $table->string('dir_name')->nullable();
            $table->string('dir_surname2')->nullable();
            $table->string('tel_director')->nullable();
            $table->text('dir_passport_file')->nullable();
            $table->string('inn')->nullable();
            $table->string('inn_file')->nullable();
            $table->string('license')->nullable();
            $table->text('license_file')->nullable();
            $table->string('agreement_contract')->nullable();
            $table->text('agreement_contract_file')->nullable();
            $table->string('cadastre')->nullable();
            $table->text('cadastre_file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
