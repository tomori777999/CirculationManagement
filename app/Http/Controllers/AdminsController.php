<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminsController extends Controller
{



  public function index()
  {
    return view('circulatemanagement.admins_page');
  }








}
