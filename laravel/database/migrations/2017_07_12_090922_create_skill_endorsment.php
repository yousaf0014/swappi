<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillEndorsmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_endorsments', function (Blueprint $table){
            $table->increments('id');
            $table->integer('skill_id')->unsigned();
            $table->integer('to_user')->unsigned();
            $table->integer('from_user')->unsigned();
            $table->timestamp('createdAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skill_endorsments');
    }
}
