<?php

use Illuminate\Database\Seeder;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            'name' => 'Sugar',
            'supplier' => 'Kroger',
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Chocolate chips',
            'supplier' => 'Food Lion',
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Milk',
            'supplier' => 'Kim\'s Cow Farm',
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Butter',
            'supplier' => 'Kroger',
        ]);
    }
}
