<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('reviews', function (Blueprint $table){
    		$table->increments('id');
    		$table->integer('user_id')->unsigned();
    		$table->integer('ratting');
    		$table->string('reviewTitle');
    		$table->string('comment');
    		$table->datetime('solutionDate');
    		$table->tinyInteger('status')->default(1);
    		$table->timestamp('createdAt');
    		$table->datetime('updatedAt');
    		 
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
    	Schema::drop('reviews');
    }
}
