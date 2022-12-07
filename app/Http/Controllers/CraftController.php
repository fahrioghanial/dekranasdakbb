<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Craft;
use App\Models\Category;
use App\Models\User;
use App\Models\WebViewerCount;

class CraftController extends Controller
{
  public function index()
  {
    if (url()->previous() == url("/") . "/") {
      if (WebViewerCount::first() == null) {
        $data['count'] = 1;
        WebViewerCount::create($data);
      } else {
        WebViewerCount::first()->increment('count');
      }
    }

    $crafts = Craft::with(['craftsman', 'category'])->where('is_confirmed', 1)->latest();
    $title = "Semua Kerajinan";

    if (request('search')) {
      if (request('category')) {
        $categories = Category::where('slug', 'like', '%' . request('category') . '%');
        $crafts->where('category_id', 'like', '%' . $categories->first()->id . '%');
        $title = "Pencarian: " . request('search') . " pada kategori " . $categories->first()->name;
      } else if (request('craftsman')) {
        $craftsmans = User::where('username', 'like', '%' . request('craftsman') . '%');
        $crafts->where('user_id', 'like', '%' . $craftsmans->first()->id . '%');
        $title = "Pencarian: " . request('search') . " pada kerajinan oleh " . $craftsmans->first()->business_name;
      } else {
        $title = "Pencarian: " . request('search');
      }
      $crafts->where('title', 'like', '%' . request('search') . '%');
    } elseif (request('category')) {
      $categories = Category::where('slug', 'like', '%' . request('category') . '%');
      $crafts->where('category_id', 'like', '%' . $categories->first()->id . '%');
      $title = "Kategori Kerajinan: " . $categories->first()->name;
    } elseif (request('craftsman')) {
      $craftsmans = User::where('username', 'like', '%' . request('craftsman') . '%');
      $crafts->where('user_id', 'like', '%' . $craftsmans->first()->id . '%');
      $title = "Kerajinan Oleh: " . $craftsmans->first()->business_name;
    }

    return view('crafts', [
      "title" => $title,
      "crafts" => $crafts->paginate(12)->withQueryString(),
      'categories' => Category::all()
    ]);
  }

  public function show(Craft $craft)
  {
    Craft::where('id', $craft->id)->increment('views');

    if ($craft->craftsman->whatsapp != null) {
      $tempWhatsapp = substr($craft->craftsman->whatsapp, 1);
      $whatsapp = substr_replace($tempWhatsapp, '62', 0, 0);
    } else {
      $whatsapp = '';
    }

    if ($craft->craftsman->contact != null) {
      $tempContact = substr($craft->craftsman->contact, 1);
      $contact = substr_replace($tempContact, '62', 0, 0);
    } else {
      $contact = '';
    }

    return view('craft', [
      "craft" => $craft,
      'whatsapp' => $whatsapp,
      'contact' => $contact,
      'categories' => Category::all()
    ]);
  }
}
