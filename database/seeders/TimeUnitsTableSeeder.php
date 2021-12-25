<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TimeUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('time_units')->delete();

        \DB::table('time_units')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Minute',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Hour',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Day',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Month',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Year',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
