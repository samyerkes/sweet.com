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
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => '2015-02-08 04:11:02',
            'category_id' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Swiss chocolate',
            'price' => '6.95',
            'description' => 'The finest chocolates from Australia, Swizterland.',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => '2015-03-08 04:11:02',
            'category_id' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'LoLo Pops',
            'price' => '2.95',
            'description' => 'Colorful fun pops. Great for kids and adults alike.',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => '2015-03-08 04:11:02',
            'category_id' => '3',
        ]);
        DB::table('products')->insert([
            'name' => 'SamSams',
            'price' => '4.95',
            'description' => 'Fudgy pudgy wanna be rich chocolates',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => \Carbon\Carbon::now(),
            'category_id' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Kaylyn\'s Homemade Cookies',
            'price' => '7.95',
            'description' => 'Kaylyn\'s famous chocolate chip and fudge cookies',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => '2015-09-08 04:11:02',
            'category_id' => '3',
        ]);
        DB::table('products')->insert([
            'name' => 'Alpenliebe',
            'price' => '5.00',
            'description' => '<div>Known for the exceptionally smooth and creamy qualities inherent in all its flavors, Alpenliebe is that small luxury with which people worldwide love to treat themselves whenever seeking genuine taste.</div>',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => '2015-09-08 04:11:02',
            'category_id' => '3',
        ]);
        DB::table('products')->insert([
            'name' => 'Melody Chocolaty',
            'price' => '3.00',
            'description' => '<div>Parle&nbsp;Melody&nbsp;is a perfect blend of&nbsp;chocolate&nbsp;and caramel. It comes with an irresistible layer of caramel on the outside and a delightful&nbsp;chocolate&nbsp;filling within.</div>',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => '2015-09-08 04:11:02',
            'category_id' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Belgian Chocolate',
            'price' => '8.00',
            'description' => '<div>Pralines&nbsp;made in Belgium are usually soft-centered confections with a chocolate casing. Most commonly in the form of a flaky or smooth chocolate ball or traditionally a&nbsp;truffle-shaped lump, Belgian chocolate truffles are in encrusted form containing wafers or coated in a high-quality cocoa powder.</div>',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => '2015-09-08 04:11:02',
            'category_id' => '3',
        ]);
        DB::table('products')->insert([
            'name' => 'Lolo\'s Cocoa Pretzels',
            'price' => '7.00',
            'description' => '<div>Covered in our velvety chocolate, these pretzels give a salty sweet sensation to your palette.</div>',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => '2015-09-08 04:11:02',
            'category_id' => '3',
        ]);
        DB::table('products')->insert([
            'name' => 'SSC Signature Whoopie Pie',
            'price' => '3.00',
            'description' => '<div>Soft chocolate cake with a delicious creme filling.</div>',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => '2015-09-08 04:11:02',
            'category_id' => '3',
        ]);
        DB::table('products')->insert([
            'name' => 'Red Velvet Whoopie Pie',
            'price' => '3.00',
            'description' => '<div>Soft red velvet chocolate cake with a delicious creme filling.</div>',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => '2015-09-08 04:11:02',
            'category_id' => '3',
        ]);
        DB::table('products')->insert([
            'name' => 'SSC Classic Choco D\'lites',
            'price' => '2.00',
            'description' => '<div>A combination of pistachios, strawberries, and our signature chocolate.</div>',
            'recipe' => 'Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.',
            'units_per_batch' => '50',
            'inventory' => '100',
            'created_at' => '2015-09-08 04:11:02',
            'category_id' => '1',
        ]);
    }
}