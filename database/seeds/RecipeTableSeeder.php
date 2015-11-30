<?php

use Illuminate\Database\Seeder;

class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'ingredient_id' => 1,
            'product_id' => 1,
            'quantity' => 100,
        ]);
        DB::table('recipes')->insert([
            'ingredient_id' => 2,
            'product_id' => 1,
            'quantity' => 200,
        ]);
    }
}
