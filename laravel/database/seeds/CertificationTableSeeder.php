<?php

use Illuminate\Database\Seeder;

class CertificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('certifications')->insert([
    			'user_id' => 1,
    			'certName' => 'Best in Design - The Webby Awards 2012',
    			'certOrg'	=> 'The Webby Awards',
    			'certLogo'	=> 'default-logo.png',
    			'certDate'	=> '2015-03-20'
    	]);
    }
}
