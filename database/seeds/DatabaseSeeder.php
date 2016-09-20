<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use App\Computer;

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
        $this->call('AdminsTableSeeder');
        // $this->call('LogsTableSeeder');
    }
}
