<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Computer;
use App\Http\Requests;
use Auth;

class CirculationManagementController extends Controller
{
    private $computer;

    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
    }

    public function index()
    {
      $computers = $this->computer->all();
      $user_name = Auth::user()->name;
      return view('circulatemanagement.circulatelist')->with(compact('computers','user_name'));
    }
    public function update($computer_id)
    {
        $result = DB::select('select circulation_flag from users where id = ?', [$computer_id]);
        
        if($result==1){
          $this->computer->where('computer_id', $computer_id)->update(['circulation_flag' =>0]);
        }elseif($result==0){
          $this->computer->where('computer_id', $computer_id)->update(['circulation_flag' =>1]);
        }

        return ;
    }
}
