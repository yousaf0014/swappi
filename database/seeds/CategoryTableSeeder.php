<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'categoryName' => str_random(10),
            'categoryImage' => 'http://www.ala-access.com/s/wp-content/uploads/2016/01/analyst-placeholder-avatar.png',
            'categoryDescription' => str_random(10),
        ]);
    }
}
