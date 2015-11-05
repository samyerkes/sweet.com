<?php

use Illuminate\Database\Seeder;

class CcTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\CreditCard', 50)->create();
    }
}
