<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'name' => 'Sam\'s house',
            'email' => 'samuelyerkes@gmail.com',
            'phone' => '8043874267',
            'address' => '2318 Penrose Dr., Bon Air, Virginia 23235'
        ]);
        DB::table('suppliers')->insert([
            'name' => 'Kroger',
            'email' => 'supplies@kroger.com',
            'phone' => '8043338888',
            'address' => '123 Belgrade Blvd., Bon Air, Virginia 23235'
        ]);
        DB::table('suppliers')->insert([
            'name' => 'Food Lion',
            'email' => 'wholesale@foodlion.com',
            'phone' => '8042327777',
            'address' => '2251 Main Street, Bon Air, Virginia 23235'
        ]);
        DB::table('suppliers')->insert([
            'name' => 'Cabell\'s Dairy Farm',
            'email' => 'wholesale@cabelldairy.com',
            'phone' => '8042223333',
            'address' => '55 Huguenot Road, Bon Air, Virginia 23235'
        ]);
    }
}
