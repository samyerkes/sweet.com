<?php

use Illuminate\Database\Seeder;

class EmployeeDatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach (range(1, 365) as $i)
        {
            $date = \Carbon\Carbon::now()->addDay($i);
            if (\Carbon\Carbon::now()->addDay($i)->isWeekend()) {
            	DB::table('shifts')->insert([
		            'date' => \Carbon\Carbon::now()->addDay($i),
		            'weekend' => true,
		        ]);
            } else {
            	DB::table('shifts')->insert([
		            'date' => \Carbon\Carbon::now()->addDay($i),
		            'weekend' => false,
		        ]);
            }	    	
        }
    }
}
