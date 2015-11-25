<?php

use Illuminate\Database\Seeder;

class ProductionScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('batches')->insert([
            'product_id' => 1,
            'batches' => 1,
            'proddate' => \Carbon\Carbon::createFromTime(24, 0, 0, 'America/New_York'),
            'status_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
