<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
  public function index()
  {
    $articles = Article::with(['user'])->where('is_show', 1)->latest();
    $title = "Semua Artikel";

    if (request('search')) {
      $articles->where('title', 'like', '%' . request('search') . '%');
      $title = "Pencarian: " . request('search');
    }

    return view('articles', [
      "title" => $title,
      "articles" => $articles->paginate(10)->withQueryString()
    ]);
  }

  public function show(Article $article)
  {
    return view('article', [
      "article" => $article
    ]);
  }
}
