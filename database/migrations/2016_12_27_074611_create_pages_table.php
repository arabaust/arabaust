<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_title');
            $table->string('en_title');
            $table->string('ar_description');
            $table->string('en_description');
            $table->string('ar_meta_title');
            $table->string('en_meta_title');
            $table->string('ar_meta_description');
            $table->string('en_meta_description');
            $table->string('ar_meta_keyword');
            $table->string('en_meta_keyword');
            $table->string('image');
            $table->boolean('status');
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
        //
    }
}
