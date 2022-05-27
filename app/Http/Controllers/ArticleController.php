<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
  public function index()
  {
    return view('articles', [
      "articles" => Article::with(['user'])->where('is_show', 1)->latest()->get()
    ]);
  }

  public function show(Article $article)
  {
    return view('article', [
      "article" => $article
    ]);
  }
}
