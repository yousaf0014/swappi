<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('packages', function (Blueprint $table) {
    		$table->increments('id');
            $table->string('package_name', 255);
            $table->bigInteger('package_price', 50);
            $table->string('package_identifier', 20);
            $table->timestamp('createdAt');
            $table->timestamp('updatedAt');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	 Schema::drop('packages');
    }
}
