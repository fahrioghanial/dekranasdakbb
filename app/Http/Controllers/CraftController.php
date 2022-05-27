<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Craft;
use App\Models\Category;

class CraftController extends Controller
{
  public function index()
  {
    return view('crafts', [
      "title" => "Semua Kerajinan",
      "crafts" => Craft::with(['craftsman', 'category'])->where('is_confirmed', 1)->latest()->get(),
      'categories' => Category::all()
    ]);
  }

  public function show(Craft $craft)
  {
    return view('craft', [
      "craft" => $craft,
      'categories' => Category::all()
    ]);
  }
}
