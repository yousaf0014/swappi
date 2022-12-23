<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_images', function (Blueprint $table){
            $table->increments('id');
            $table->integer('ad_id')->unsigned();
            $table->string('image');
            $table->integer('order');
            $table->tinyInteger('isFeatured')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamp('createdAt');
            $table->timestamp('updatedAt');

            $table->foreign('ad_id')->references('id')->on('ads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ad_images');
    }
}
