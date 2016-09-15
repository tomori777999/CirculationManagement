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

}
