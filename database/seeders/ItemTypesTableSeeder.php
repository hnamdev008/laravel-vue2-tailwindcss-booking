<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('item_types')->delete();

        \DB::table('item_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Room',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Car',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Service',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
