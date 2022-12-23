<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('experiences', function (Blueprint $table){
    		$table->increments('id');
    		$table->integer('user_id')->unsigned();
    		$table->string('designation');
    		$table->string('orgName');
    		$table->text('description');
    		$table->string('logo');
    		$table->timestamp('startDate');
    		$table->timestamp('endDate');
    		$table->string('address');
    		$table->string('city');
    		$table->string('country');
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
    	Schema::drop('experiences');
    }
}
