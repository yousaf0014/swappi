<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('favorite_users', function (Blueprint $table){
    		$table->increments('id');
    		$table->integer('user_id')->unsigned();
    		$table->integer('favorite_id')->unsigned();
    		$table->timestamp('createdAt');
    		 
    		$table->foreign('user_id')->references('id')->on('users');
    		$table->foreign('favorite_id')->references('id')->on('users');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::drop('favorite_users');
    }
}
