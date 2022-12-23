<?php

use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('ads')->insert([
    		'user_id'	=> 2,
            'adHeadline' => str_random(10),
            'adDescription' => str_random(100),
            'inExchange' => '4 HRS Programming',
        ]);

        DB::table('ad_images')->insert([
    		'ad_id'	=> 3,
            'image' => 'http://impunitywatch.com/wp-content/themes/gonzo/images/no-image-featured-image.png',
            'order' => 1,
            'isFeatured' => 1
        ]);

        DB::table('ad_images')->insert([
    		'ad_id'	=> 3,
            'image' => 'http://impunitywatch.com/wp-content/themes/gonzo/images/no-image-featured-image.png',
            'order' => 1,
        ]);

        DB::table('ad_images')->insert([
    		'ad_id'	=> 3,
            'image' => 'http://impunitywatch.com/wp-content/themes/gonzo/images/no-image-featured-image.png',
            'order' => 1,
        ]);
    }
}
