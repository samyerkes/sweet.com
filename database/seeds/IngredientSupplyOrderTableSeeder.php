<?php

use Illuminate\Database\Seeder;

class IngredientSupplyOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredient_supply_orders')->insert([
            'supplyorder_id' => 1,
            'ingredient_id' => 1,
            'quantity' => 10,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('ingredient_supply_orders')->insert([
            'supplyorder_id' => 1,
            'ingredient_id' => 2,
            'quantity' => 10,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
