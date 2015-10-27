<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'Manager'
        ]);
        DB::table('roles')->insert([
            'role' => 'Employee'
        ]);
        DB::table('roles')->insert([
            'role' => 'Customer'
        ]);
    }
}
