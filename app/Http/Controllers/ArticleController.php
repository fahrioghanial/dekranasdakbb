<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\WebViewerCount;

class ArticleController extends Controller
{
  public function index()
  {
    if (url()->previous() == url("/") . "/") {
      WebViewerCount::first()->increment('count');
    }

    $articles = Article::with(['user'])->where('is_show', 1)->latest();
    $title = "Semua Artikel";

    if (request('search')) {
      $articles->where('title', 'like', '%' . request('search') . '%');
      $title = "Pencarian: " . request('search');
    }

    return view('articles', [
      "title" => $title,
      "articles" => $articles->paginate(12)->withQueryString()
    ]);
  }

  public function show(Article $article)
  {
    return view('article', [
      "article" => $article
    ]);
  }
}
