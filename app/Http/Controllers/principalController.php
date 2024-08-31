<?php

namespace App\Http\Controllers;


class principalController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function ingresar()
  {
    return view('layouts.principal');
  }
 
}
