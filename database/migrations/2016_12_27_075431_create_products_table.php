<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

          $table->increments('id');
          $table->string('en_name');
          $table->string('ar_name');
          $table->text('en_description');
          $table->text('ar_description');
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
        Schema::drop('products');
    }
}