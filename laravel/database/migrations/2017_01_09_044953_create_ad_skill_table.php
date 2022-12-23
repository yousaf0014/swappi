<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('ad_skill', function (Blueprint $table){
    		$table->integer('ad_id')->unsigned();
    		$table->foreign('ad_id')->references('id')->on('ads');
    		
    		$table->integer('skill_id')->unsigned();
    		$table->foreign('skill_id')->references('id')->on('skills');
    		
    		$table->integer('category_id')->unsigned();
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
    	Schema::drop('ad_skill');
    }
}
