<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('users', function (Blueprint $table) {
    		$table->string('city', 100)->nullable();
    		$table->string('username', 150)->after('email')->unique();
    		$table->tinyInteger('isVip')->default(0);
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('users', function (Blueprint $table) {
    		$table->dropColumn('city');
    		$table->dropColumn('username');
    		$table->dropColumn('isVip');
    	});
    }
}
