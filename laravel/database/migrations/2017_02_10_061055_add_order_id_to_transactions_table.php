<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderIdToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('transactions', function (Blueprint $table) {
    		$table->string('order_id', 255)->after('id');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('transactions', function (Blueprint $table) {
    		$table->dropColumn('order_id');
    	});
    }
}
