<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_track', function (Blueprint $table) {
            $table->increments('id');
            $table->string('section');
            $table->string('change');
            $table->integer('user_id')->unsigned();
            $table->integer('file_id')->unsigned();
            $table->string('file_name');
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
        Schema::drop('users_track');
    }
}
