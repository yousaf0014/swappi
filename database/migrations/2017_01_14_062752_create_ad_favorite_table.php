<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	if (!Schema::hasTable('ad_favorite')) {
	    	Schema::create('ad_favorite', function (Blueprint $table){
	    		$table->increments('id');
	    		$table->integer('user_id')->unsigned();
	    		$table->integer('ad_id')->unsigned();
	    		$table->timestamp('createdAt');
	    		 
	    		$table->foreign('user_id')->references('id')->on('users');
	    		$table->foreign('ad_id')->references('id')->on('ads');
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
    	Schema::drop('ad_favorite');
    }
}
