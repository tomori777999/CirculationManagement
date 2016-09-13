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
    public function update(Request $request)
    {
        $input = $request->all();
        var_dump($input);
        $computer_id = $input['computer_id'];
        DB::update('update computers set circulation_flag = 1 where id = ?', [$computer_id]);
        DB::insert('insert into logs (user_id, computer_id,circulation_flag) values (?, ?,?)', [Auth::user()->id, $computer_id,1]);
        return redirect()->to('circulatemanagement');
    }
}
