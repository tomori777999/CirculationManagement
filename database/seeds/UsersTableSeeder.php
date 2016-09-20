<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name'      => 'admin',
                'email' => 'gizmoadmin@sample.com',
                'password' => '$2y$10$shDyeY25iITYM2x9oGC1wuQi9cM/Dq5jXlpkWU2oSL4Qz1R2KHgNS',
                'admin_flag' => '1',
            ],
        ]);

    }

}
