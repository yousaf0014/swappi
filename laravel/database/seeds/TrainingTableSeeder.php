<?php

use Illuminate\Database\Seeder;

class TrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('trainings')->insert([
    			'user_id' => 1,
    			'name' => 'Aarhus Business College',
    			'logo'	=> 'default-logo.png',
    			'tagLine'	=> 'Bachelor\'s degree, Bachelor in Web Development',
    			'startDate'	=> '2009-01-05',
    			'endDate'	=> '2011-01-05',
    	]);
    }
}
