<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('certifications', function (Blueprint $table){
    		$table->increments('id');
    		$table->integer('user_id')->unsigned();
    		$table->string('certName');
    		$table->string('certOrg');
    		$table->string('certLogo');
    		$table->timestamp('certDate');
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
    	Schema::drop('certifications');
    }
}
