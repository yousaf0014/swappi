<?php

use Illuminate\Database\Seeder;

class ExperienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('experiences')->insert([
    			'user_id' => 1,
    			'designation' => 'Digital designer - Founder',
    			'orgName'	=> 'LEGO',
    			'description'	=> 'Standard section of Lorem Ipsum, which is used since the 1500s is reproduced below for those interested.',
    			'logo'	=> 'default-logo.png',
    			'startDate'	=> '2011-07-15',
    			'endDate'	=> '2014-05-20',
    			'address'	=> '',
    			'city'	=> 'Århus Area',
    			'country'	=> 'Denmark'
    	]);
    }
}
