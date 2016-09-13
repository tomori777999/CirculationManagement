<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Computer;
use App\Http\Requests;
use Auth;
use App\Log;
use DB;

class CirculationManagementController extends Controller
{
    private $computer;
    private $Log;

    public function __construct(Computer $computer,Log $log)
    {
        $this->computer = $computer;
        $this->log = $log;
    }

    public function index()
    {
      $computers = $this->computer->all();
      $user_id = Auth::user()->id;
      $user_status =DB::table('logs')
                     ->where('user_id', $user_id)
                     ->orderBy('id','asc')
                     ->take(1)
                     ->value('circulation_flag');


      return view('circulatemanagement.circulatelist')->with(compact('computers','user_status'));
    }
    public function update($computer_id)
    {


      return ;
    }
}
