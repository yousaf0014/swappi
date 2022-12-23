<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table){
            $table->increments('id');
            $table->integer('sender_id')->unsigned();
            $table->integer('reciever_id')->unsigned();
            $table->text('msgText');
            $table->tinyInteger('isUnread')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->timestamp('createdAt');
            $table->timestamp('updatedAt');

            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('reciever_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::drop('messages');
    }
}
