<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Computer;
use App\Http\Requests;

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
      return view('circulatemanagement.circulatelist')->with(compact('computers'));
    }
}
