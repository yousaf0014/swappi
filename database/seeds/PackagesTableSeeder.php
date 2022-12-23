<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
			[
				'package_name' 			=> 'Vælg Premium',
				'package_price' 		=> 	15050,
				'package_identifier' 	=> 'premium',
			],
			[
				'package_name' 			=> 'Vælg Gold',
				'package_price' 		=> 10000,
				'package_identifier' 	=> 'gold',
			],
			[
				'package_name' 			=> 'Vælg Standard',
				'package_price' 		=> 1000,
				'package_identifier' 	=> 'standard',
			],
        ]);
    }
}
