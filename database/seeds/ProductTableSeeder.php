<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'German chocolate',
            'price' => '5.95',
            'description' => 'The finest chocolates from Berlin, Germany.',
            'inventory' => '30',
            'created_at' => '2015-02-08 04:11:02',
        ]);
        DB::table('products')->insert([
            'name' => 'Swiss chocolate',
            'price' => '6.95',
            'description' => 'The finest chocolates from Australia, Swizterland.',
            'inventory' => '10',
            'created_at' => '2015-03-08 04:11:02',
        ]);
        DB::table('products')->insert([
            'name' => 'LoLo Pops',
            'price' => '2.95',
            'description' => 'Colorful fun pops. Great for kids and adults alike.',
            'inventory' => '12',
            'created_at' => '2015-03-08 04:11:02',
        ]);
        DB::table('products')->insert([
            'name' => 'SamSams',
            'price' => '4.95',
            'description' => 'Fudgy pudgy wanna be rich chocolates',
            'inventory' => '9',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Kaylyn\'s Homemade Cookies',
            'price' => '7.95',
            'description' => 'Kaylyn\'s famous chocolate chip and fudge cookies',
            'inventory' => '40',
            'created_at' => '2015-09-08 04:11:02',
        ]);
    }
}
