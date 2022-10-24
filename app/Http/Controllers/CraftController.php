<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Craft;
use App\Models\Category;
use App\Models\User;

class CraftController extends Controller
{
  public function index()
  {
    $crafts = Craft::with(['craftsman', 'category'])->where('is_confirmed', 1)->latest();
    $title = "Semua Kerajinan";

    if (request('search')) {
      $crafts->where('title', 'like', '%' . request('search') . '%');
      $title = "Pencarian: " . request('search');
    } elseif (request('category')) {
      $categories = Category::where('slug', 'like', '%' . request('category') . '%');
      $crafts->where('category_id', 'like', '%' . $categories->first()->id . '%');
      $title = "Kategori Kerajinan: " . $categories->first()->name;
    } elseif (request('craftsman')) {
      $craftsmans = User::where('username', 'like', '%' . request('craftsman') . '%');
      $crafts->where('user_id', 'like', '%' . $craftsmans->first()->id . '%');
      $title = "Kerajinan Oleh: " . $craftsmans->first()->name;
    }

    return view('crafts', [
      "title" => $title,
      "crafts" => $crafts->paginate(10)->withQueryString(),
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
