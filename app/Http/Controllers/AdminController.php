<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{

  private $Log;

  public function index()
  {
    return view('admin.index');
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
