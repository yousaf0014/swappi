<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fName');
            $table->string('lName');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('country', 100);
            $table->string('postCode', 100);
            $table->string('profileType', 100);
            $table->string('jobTitle')->nullable();
            $table->string('businessLine')->nullable();
            $table->string('businessLink')->nullable();
            $table->text('description')->nullable();
            $table->string('profilePic')->nullable();
            $table->string('coverPic')->nullable();
            $table->string('phone1', 45);
            $table->string('phone2', 45)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
