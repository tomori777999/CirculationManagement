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

  private $computers;
  private $logs;

  public function __construct(Computer $computers,Log $logs)
  {
      $this->computers = $computers;
      $this->logs = $logs;
      // $this->middleware('admin');
      $this->middleware('auth:admin');
  }

  public function index()
  {
    // if($this->auth->check())
    if(Auth::guard('admin')->check())
    {

      $form_name = "logs";
      $data =$this->logs::leftJoin('users','user_id','=','users.id')
                        ->leftJoin('computers','computer_id','=','computers.id')
                        ->orderBy('logs.id','desc')
                        ->take(30)
                        ->select('name','computer_name','logs.circulation_flag','logs.created_at')
                        ->get();

     return view('admin.index')->with(compact('form_name','data'));
    }else
    {
      $worning_msg = '管理者以外の方はアクセスできないページです。';
      return view('admin.notAdmin')->with(compact('worning_msg'));
    }
  }

  public function store(){
    if(Auth::guard('admin')->check())
    {
      $form_name = Request::input('form_name');
      $data;
      if($form_name == "computers")
      {
        // $data = $this->computer->all();
        $data = $this->computers::where('delete_flag', '0')
                                ->orderBy('id')
                                ->get();
      }elseif ($form_name == "logs") {
        $data =$this->logs::leftJoin('users','user_id','=','users.id')
                          ->leftJoin('computers','computer_id','=','computers.id')
                          ->orderBy('logs.id','desc')
                          ->take(20)
                          ->select('name','computer_name','logs.circulation_flag','logs.created_at')
                          ->get();
      }elseif ($form_name == "add_computer") {
        return view('admin.index')->with(compact('form_name'));
      }elseif($form_name == "edit_computer"){
        $computer_id = Request::input('computer_id');
        $data = $this->computers::where('id', $computer_id)
                                ->get();
        return view('admin.index')->with(compact('form_name','data'));
      }

      return view('admin.index')->with(compact('form_name','data'));

    }else{
      $worning_msg = '管理者以外の方はアクセスできないページです。';
      return view('admin.notAdmin')->with(compact('worning_msg'));
    }
  }

  public function addComputer()
  {
    $computer_name =  Request::input('computer_name');
    $this->computers->computer_name = $computer_name;
    $this->computers->save();
    // DB::insert('insert into computers (computer_name) values (?)', [$computer_name]);

    $form_name = "computers";
    // $data = $this->computers->all();
    $data = $this->computers::where('delete_flag', '0')
                            ->orderBy('id')
                            ->get();

    return view('admin.index')->with(compact('form_name','data'));
  }

  public function deleteComputer()
  {
    $computer_id =  Request::input('computer_id');
    $delete_computer = $this->computers::where('id',$computer_id)->first();
    $delete_computer->delete_flag = 1;
    $delete_computer->save();
    // DB::update('update computers set delete_flag = 1 where id = ?', [$computer_id]);

    $form_name = "computers";
    // $data = $this->computers->all();
    $data = DB::table('computers')
                   ->where('delete_flag', '0')
                   ->orderBy('id')
                   ->get();

    return view('admin.index')->with(compact('form_name','data'));
  }

  public function editComputer()
  {
    $computer_id =  Request::input('computer_id');
    $replace_name =  Request::input('computer_name');
    $edit_computer = $this->computers::where('id',$computer_id)->first();
    $edit_computer->computer_name = $replace_name;
    $edit_computer->save();
    // DB::update('update computers set computer_name = ? where id = ?', [$computer_name,$computer_id]);

    $form_name = "computers";
    // $data = $this->computers->all();
    $data = $this->computers::where('delete_flag', '0')
                            ->orderBy('id')
                            ->get();

    return view('admin.index')->with(compact('form_name','data'));
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

}
