<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddShortDescriptionToAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('ads', function (Blueprint $table) {
    		if (!Schema::hasColumn('ads', 'shortDescription')) {
    			$table->text('shortDescription');
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
    		$table->dropColumn('shortDescription');
    	});
    }
}
