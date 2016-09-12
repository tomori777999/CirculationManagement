<?php

use Illuminate\Database\Seeder;

class ComputersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('computers')->truncate();

        DB::table('computers')->insert([
            [
                'computer_name'   => 'PC01',
                'circulation_flag' => 1
            ],
            [
                'computer_name'   => 'PC02',
                'circulation_flag' => 0
            ]
        ]);

    }
}
