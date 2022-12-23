<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('adHeadline');
            $table->text('adDescription');
            $table->string('inExchange');
            $table->tinyInteger('isFeatured')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamp('createdAt');
            $table->timestamp('updatedAt');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ads');
    }
}
