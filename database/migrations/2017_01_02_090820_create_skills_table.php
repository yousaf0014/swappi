<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table){
            $table->increments('id');
            $table->string('skillName');
            $table->integer('category_id')->unsigned();
            $table->tinyInteger('status')->default(1);
            $table->timestamp('createdAt');
            $table->timestamp('updatedAt');

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
        Schema::drop('skills');
    }
}
