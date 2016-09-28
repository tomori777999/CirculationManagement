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
    private $computers;
    private $logs;

    public function __construct(Computer $computers,Log $logs)
    {
        $this->computers = $computers;
        $this->logs = $logs;
        $this->middleware('auth');
    }

    public function index()
    {
      $user_id = Auth::user()->id;
      $user_status;
      $data;

      $user_log = $this->logs::where('user_id', $user_id)
                          ->orderBy('id','desc')
                          ->first();
      if($user_log == NULL){
        $user_status = 0;
      }else{
        $user_status = $user_log->circulation_flag;
      }

      if($user_status == 1){
        $computer_id = $user_log->computer_id;
        $using_computer = $this->computers::where('id', $computer_id)
                       ->first();
        $data = $using_computer->computer_name;
      }else{
        $data = $this->computers::where('delete_flag', '0')
                       ->orderBy('id')
                       ->get();
      }
        return view('circulatemanagement.circulatelist')->with(compact('data','user_status'));
    }

    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $input = $request->all();
        $computer_id = $input['computer_id'];

        // DB::update('update computers set circulation_flag = 1 where id = ?', [$computer_id]);
        $use_computer = $this->computers::where('id',$computer_id)->first();
        $use_computer->circulation_flag = 1;
        $use_computer->save();

        // DB::insert('insert into logs (user_id, computer_id,circulation_flag) values (?, ?,?)', [Auth::user()->id, $computer_id,1]);
        $this->logs->user_id = $user_id;
        $this->logs->computer_id = $computer_id;
        $this->logs->circulation_flag = 1;
        $this->logs->save();
        return redirect()->to('/');
    }
    public function replace()
    {
      $user_id = Auth::user()->id;
      $using_log = $this->logs::where('user_id', $user_id)
                                    ->orderBy('id','desc')
                                    ->first();
      $computer_id = $using_log->computer_id;

      // DB::update('update computers set circulation_flag = 0 where id = ?', [$computer_id]);
      $replace_computer = $this->computers::where('id',$computer_id)->first();
      $replace_computer->circulation_flag = 0;
      $replace_computer->save();

      // DB::insert('insert into logs (user_id, computer_id,circulation_flag) values (?, ?,?)', [$user_id, $computer_id,0]);
      $this->logs->user_id = $user_id;
      $this->logs->computer_id = $computer_id;
      $this->logs->circulation_flag = 0;
      $this->logs->save();

      return redirect()->to('/');
    }
}
