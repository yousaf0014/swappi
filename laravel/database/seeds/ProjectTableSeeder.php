<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('projects')->insert([
    			'user_id' => 1,
    			'category_id' => 1,
    			'title'	=> 'LEGO Star Wars characters made from scratch',
    			'logo'	=> 'default-project.png',
    			'description'	=> 'LEGO Star Wars characters description',
    			'startDate'	=> '2015-11-05',
    			'endDate'	=> '2016-05-12'
    	]);
    }
}
