<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Computer;
use DB;
use Auth;

class AdminController extends Controller
{

  private $computer;

  public function __construct(Computer $computer)
  {
      $this->computer = $computer;
      $this->middleware('admin');
  }

  public function index()
  {
    // $admin_flag = Auth::user()->admin_flag;
    // if($admin_flag == 1)
    // {
    $computers = $this->computer->all();
    $logs =DB::table('logs')
                   ->leftJoin('users','user_id','=','users.id')
                   ->leftJoin('computers','computer_id','=','computers.id')
                   ->orderBy('logs.id','desc')
                   ->take(20)
                   ->select('name','computer_name','logs.circulation_flag','logs.created_at')
                   ->get();

    return view('admin.index')->with(compact('computers','logs'));
  // }else
  // {
  //   $worning_msg = '管理者以外の方はアクセスできないページです。';
  //   return view('admin.notAdmin')->with(compact('worning_msg'));
  // }
  }
  public function show(){
     $logs = $this->Log
                  ->leftJoin('users','user_id','=','id')
                  ->leftJoin('computers','computer_id','=','id')
                  ->orderBy('id','desc')
                  ->take(20)
                  ->value('name','computer_names','circulation_flag','create_at');
    return view('admin.index')->with(compact('logs',$logs));
  }

}
