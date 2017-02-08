<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->boolean('status');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password', 60);
            $table->integer('role_id')->unsigned();
            $table->string('phone_1');
            $table->string('phone_2');
            $table->string('country');
            $table->string('city');
            $table->rememberToken();
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::drop('users');
    }
}
