<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTransactionTypeToTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('transactions', function (Blueprint $table) {
    		if (!Schema::hasColumn('transactions', 'transaction_type')) {
    			$table->string('transaction_type', 20);
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
    	Schema::table('transactions', function (Blueprint $table) {
    		$table->dropColumn('transaction_type');
    	});
    }
}
