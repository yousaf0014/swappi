<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('projects', function (Blueprint $table){
    		$table->increments('id');
    		$table->integer('user_id')->unsigned();
    		$table->integer('category_id')->unsigned();
    		$table->string('title');
    		$table->text('description');
    		$table->string('logo');
    		$table->timestamp('startDate');
    		$table->timestamp('endDate');
    		$table->tinyInteger('status')->default(1);
    		$table->timestamp('createdAt');
    		$table->timestamp('updatedAt');
    	
    		$table->foreign('user_id')->references('id')->on('users');
    		$table->foreign('category_id')->references('id')->on('categories');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::drop('projects');
    }
}
