<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderProductTableSeeder::class);    
        $this->call(AddressTableSeeder::class);   
        $this->call(EmployeeDatesTableSeeder::class);
        $this->call(EmployeeShiftsTableSeeder::class);
        $this->call(CreditcardTableSeeder::class);

        Model::reguard();
    }
}
