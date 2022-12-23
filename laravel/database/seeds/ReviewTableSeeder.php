<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('reviews')->insert([
    			'user_id' => 1,
    			'ratting' => 4,
    			'reviewTitle'	=> 'PSD to HTML5',
    			'comment'	=> 'Super cool work! Is very pleased with the result in the end. The communication was okay.',
    			'solutionDate'	=> '2015-01-01'
    	]);
    }
}
