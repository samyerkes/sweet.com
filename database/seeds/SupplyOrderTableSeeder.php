<?php

use Illuminate\Database\Seeder;

class SupplyOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplyorders')->insert([
            'supplier_id' => 1,
            'status_id' => 1,
        ]);
        DB::table('supplyorders')->insert([
            'supplier_id' => 1,
            'status_id' => 2,
        ]);
    }
}
