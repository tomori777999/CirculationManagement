<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Computer;
use DB;
use Auth;
use App\Log;
use Input;
use Request;


class AdminController extends Controller
{

  private $computer;

  public function __construct(Computer $computer)
  {
      $this->computer = $computer;
      // $this->middleware('admin');
      $this->middleware('auth:admin');
  }

  public function index()
  {
    // if($this->auth->check())
    if(Auth::guard('admin')->check())
    {

      $form_name = "logs";
      $data =DB::table('logs')
                   ->leftJoin('users','user_id','=','users.id')
                   ->leftJoin('computers','computer_id','=','computers.id')
                   ->orderBy('logs.id','desc')
                   ->take(20)
                   ->select('name','computer_name','logs.circulation_flag','logs.created_at')
                   ->get();

     return view('admin.index')->with(compact('form_name','data'));
    }else
    {
      $worning_msg = '管理者以外の方はアクセスできないページです。';
      return view('admin.notAdmin')->with(compact('worning_msg'));
    }
  }
  // public function show(){
  //   var_dump('admincontrollershow');
  //   exit;
  //    $logs = $this->Log
  //                 ->leftJoin('users','user_id','=','id')
  //                 ->leftJoin('computers','computer_id','=','id')
  //                 ->orderBy('id','desc')
  //                 ->take(20)
  //                 ->value('name','computer_names','circulation_flag','create_at');
  //   return view('admin.index')->with(compact('logs',$logs));
  // }



  public function store(){
    if(Auth::guard('admin')->check())
    {
      $form_name = Request::input('form_name');
      $data;
      if($form_name == "computers")
      {
        // $data = $this->computer->all();
        $data = DB::table('computers')
                       ->where('delete_flag', '0')
                       ->orderBy('id')
                       ->get();
      }elseif ($form_name == "logs") {
        $data =DB::table('logs')
                       ->leftJoin('users','user_id','=','users.id')
                       ->leftJoin('computers','computer_id','=','computers.id')
                       ->orderBy('logs.id','desc')
                       ->take(20)
                       ->select('name','computer_name','logs.circulation_flag','logs.created_at')
                       ->get();
      }elseif ($form_name == "add_computer") {
        return view('admin.index')->with(compact('form_name'));
      }
      return view('admin.index')->with(compact('form_name','data'));

    }else{
      $worning_msg = '管理者以外の方はアクセスできないページです。';
      return view('admin.notAdmin')->with(compact('worning_msg'));
    }
  }
  public function addComputer()
  {
    $computer_name =  Request::input('title');
    DB::insert('insert into computers (computer_name) values (?)', [$computer_name]);

    $form_name = "computers";
    // $data = $this->computer->all();
    $data = DB::table('computers')
                   ->where('delete_flag', '0')
                   ->orderBy('id')
                   ->get();

    return view('admin.index')->with(compact('form_name','data'));
  }

}
