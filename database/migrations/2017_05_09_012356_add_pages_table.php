<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('pages', function (Blueprint $table) {
    		$table->increments('id');
            $table->text('page_name');
            $table->string('page_identifier', 50);
            $table->text('page_content', 50);
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
    	 Schema::drop('pages');
    }
}
