<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('ads', function (Blueprint $table) {
    		if (!Schema::hasColumn('ads', 'slug')) {
    			$table->string('slug')->unique();
    		}
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('ads', function (Blueprint $table) {
    		$table->dropColumn('slug');
    	});
    }
}
