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
            'supplier_id' => '1',
            'unit' => 'Cups',
            'quantity' => '500'
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Cocoa powder',
            'supplier_id' => '1',
            'unit' => 'Cups',
            'quantity' => '500'
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Chocolate chips',
            'supplier_id' => '2',
            'unit' => 'Cups',
            'quantity' => '500'
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Milk',
            'supplier_id' => '3',
            'unit' => 'Cups',
            'quantity' => '500'
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Butter',
            'supplier_id' => '1',
            'unit' => 'Sticks',
            'quantity' => '500'
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Salt',
            'supplier_id' => '1',
            'unit' => 'Tablespoons',
            'quantity' => '500'
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Vanilla',
            'supplier_id' => '1',
            'unit' => 'Tablespoons',
            'quantity' => '500'
        ]);
    }
}
