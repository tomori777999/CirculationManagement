<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
 {
    // var_dump('adminhomecontrollerindex');
    // exit;
     return view('/admin/home');
 //     if(Auth::guard('admin')->check())
 //     {
 //     $computers = $this->computer->all();
 //     $logs =DB::table('logs')
 //                    ->leftJoin('users','user_id','=','users.id')
 //                    ->leftJoin('computers','computer_id','=','computers.id')
 //                    ->orderBy('logs.id','desc')
 //                    ->take(20)
 //                    ->select('name','computer_name','logs.circulation_flag','logs.created_at')
 //                    ->get();
 //
 //     return view('admin.index')->with(compact('computers','logs'));
 //   }else
 //   {
 //     $worning_msg = '管理者以外の方はアクセスできないページです。';
 //     return view('admin.notAdmin')->with(compact('worning_msg'));
 //   }
 }
}
