<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIconToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('categories', function (Blueprint $table) {
    		$table->string('categoryIcon', 100)->nullable();
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('categories', function (Blueprint $table) {
    		$table->dropColumn('categoryIcon');
    	});
    }
}
