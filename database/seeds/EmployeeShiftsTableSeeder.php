<?php

use Illuminate\Database\Seeder;

class EmployeeShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 100) as $i) {
            DB::table('user_shifts')->insert([
	            'user_id' => rand(1,2),
	            'shift_id' => $i,
	            'start_time' => \Carbon\Carbon::createFromTime(8, 0, 0, 'America/New_York'),
	            'end_time' => \Carbon\Carbon::createFromTime(17, 0, 0, 'America/New_York'),
	        ]);	    	
        }
    }
}
