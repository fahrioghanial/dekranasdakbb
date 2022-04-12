<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Craft;

class CraftController extends Controller
{
  public function index()
  {
    return view('crafts', [
      "crafts" => Craft::all()
    ]);
  }

  public function show(Craft $craft)
  {
    return view('craft', [
      "craft" => $craft
    ]);
  }
}
