<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fName' => str_random(10),
            'lName' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'country' => str_random(10),
        	'city'	=> str_random(10),
            'postCode' => rand(0, 9),
            'profileType' => '',
            'jobTitle' => str_random(10),
            'businessLine' => str_random(10),
            'businessLink' => 'http://exmple.com',
            'description' => str_random(10),
            'profilePic' => 'http://www.ala-access.com/s/wp-content/uploads/2016/01/analyst-placeholder-avatar.png',
            'coverPic' => 'http://www.ala-access.com/s/wp-content/uploads/2016/01/analyst-placeholder-avatar.png',
            'phone1' => rand(0, 9),
            'phone2' => rand(0, 9),
        ]);
    }
}
