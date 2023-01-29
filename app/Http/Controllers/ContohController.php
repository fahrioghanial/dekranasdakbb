<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContohController extends Controller
{
  public function index()
  {
    return view('about');
  }

  public function ganjilgenap()
  {
    return view('contoh');
  }
}
