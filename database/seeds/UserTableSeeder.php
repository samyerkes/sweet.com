<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'fname' => 'Guest',
            'lname' => 'Guest',
            'email' => 'guest@sweetsweetchocolate.com',
            'role_id' => '3',
            'password' => Hash::make('guest'),
        ]);
        DB::table('users')->insert([
            'fname' => 'Sam',
            'lname' => 'Yerkes',
            'email' => 'sam@gmail.com',
            'role_id' => '1',
            'password' => Hash::make('test'),
        ]);
        DB::table('users')->insert([
            'fname' => 'Lauren',
            'lname' => 'Yerkes',
            'email' => 'lo@gmail.com',
            'role_id' => '2',
            'password' => Hash::make('test'),
        ]);
        DB::table('users')->insert([
            'fname' => 'Moose',
            'lname' => 'Yerkes',
            'email' => 'moose@gmail.com',
            'role_id' => '3',
            'password' => Hash::make('test'),
        ]);
        factory('App\User', 25)->create();
    }
}
