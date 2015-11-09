<?php

use Illuminate\Database\Seeder;

class HoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hours')->insert([
            'day' => 'Monday',
            'hours' => '10 a.m. - 6 p.m.',
        ]);
        DB::table('hours')->insert([
            'day' => 'Tuesday',
            'hours' => '10 a.m. - 6 p.m.',
        ]);
        DB::table('hours')->insert([
            'day' => 'Wednesday',
            'hours' => '10 a.m. - 6 p.m.',
        ]);
        DB::table('hours')->insert([
            'day' => 'Thursday',
            'hours' => '10 a.m. - 6 p.m.',
        ]);
        DB::table('hours')->insert([
            'day' => 'Friday',
            'hours' => '10 a.m. - 6 p.m.',
        ]);
        DB::table('hours')->insert([
            'day' => 'Saturday',
            'hours' => '10 a.m. - 6 p.m.',
        ]);
        DB::table('hours')->insert([
            'day' => 'Sunday',
            'hours' => '10 a.m. - 4 p.m.',
        ]);
    }
}
