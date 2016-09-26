<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name'      => 'user01',
                'email' => 'user01@sample.com',
                'password' => Hash::make('user01'),
            ],
        ]);

    }

}
