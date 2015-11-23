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
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'inventory' => '30',
            'created_at' => '2015-02-08 04:11:02',
            'category_id' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Swiss chocolate',
            'price' => '6.95',
            'description' => 'The finest chocolates from Australia, Swizterland.',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'inventory' => '10',
            'created_at' => '2015-03-08 04:11:02',
            'category_id' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'LoLo Pops',
            'price' => '2.95',
            'description' => 'Colorful fun pops. Great for kids and adults alike.',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'inventory' => '12',
            'created_at' => '2015-03-08 04:11:02',
            'category_id' => '3',
        ]);
        DB::table('products')->insert([
            'name' => 'SamSams',
            'price' => '4.95',
            'description' => 'Fudgy pudgy wanna be rich chocolates',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'inventory' => '9',
            'created_at' => \Carbon\Carbon::now(),
            'category_id' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Kaylyn\'s Homemade Cookies',
            'price' => '7.95',
            'description' => 'Kaylyn\'s famous chocolate chip and fudge cookies',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'inventory' => '40',
            'created_at' => '2015-09-08 04:11:02',
            'category_id' => '3',
        ]);
    }
}
