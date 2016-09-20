<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('ComputersTableSeeder');
        $this->call('UsersTableSeeder');
        // $this->call('LogsTableSeeder');
    }
}
