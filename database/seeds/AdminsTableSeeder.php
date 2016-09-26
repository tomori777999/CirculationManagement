<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table('admins')->truncate();

         DB::table('admins')->insert([
             [
                 'name'      => 'admin01',
                 'email' => 'admin01@sample.com',
                 'password' => Hash::make('admin01'),
             ],
         ]);

     }
    // public function run()
    // {
    //   //削除
    //   Admin::truncate();
    //
    //   //Admin生成
    //   $admin = new Admin;
    //
    //   $admin->name = "admin1";
    //   $admin->email = "admin1@sample.com";
    //   $admin->password = Hash::make('admin1');
    //
    //   //保存
    //   $admin->save();
    // }
}
