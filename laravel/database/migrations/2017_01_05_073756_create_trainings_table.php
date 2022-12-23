<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('trainings', function (Blueprint $table){
    		$table->increments('id');
    		$table->integer('user_id')->unsigned();
    		$table->string('name');
    		$table->string('logo');
    		$table->string('tagLine');
    		$table->timestamp('startDate');
    		$table->timestamp('endDate');
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
    	Schema::drop('trainings');
    }
}
