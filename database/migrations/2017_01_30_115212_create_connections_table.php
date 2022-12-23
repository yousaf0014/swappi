<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	if (!Schema::hasTable('connections')) {
	    	Schema::create('connections', function (Blueprint $table){
	    		$table->increments('id');
	    		$table->integer('user_id')->unsigned();
	    		$table->integer('follower_id')->unsigned();
	    		$table->tinyInteger('status')->default(0);
	    		$table->timestamp('createdAt');
	    		$table->timestamp('updatedAt');
	    		 
	    		$table->foreign('user_id')->references('id')->on('users');
	    		$table->foreign('follower_id')->references('id')->on('users');
	    	});
    	}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::drop('connections');
    }
}
