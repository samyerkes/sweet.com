<?php

use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Single chocolates',
        ]);
        DB::table('categories')->insert([
            'name' => 'Assorted',
        ]);
        DB::table('categories')->insert([
            'name' => 'Baked goods',
        ]);    }
}
