<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $articles = Article::where('user_id', auth()->user()->id)->get();
    return view('dashboard.articles.index', [
      'articles' => $articles
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('dashboard.articles.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'cover' => 'image|file|required',
      'title' => 'required|max:255',
      'slug' => 'required',
      'content' => 'required',
    ]);

    $validatedData['cover'] = $request->file('cover')->store('article-covers');
    $validatedData['user_id'] = auth()->user()->id;

    Article::create($validatedData);

    return redirect('/dashboard/articles')->with('success', 'Artikel berhasil dibuat!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function show(Article $article)
  {
    if ($article->user->id != auth()->user()->id) {
      abort(403);
    }
    return view('dashboard.articles.show', [
      'article' => $article
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function edit(Article $article)
  {
    if ($article->user->id != auth()->user()->id) {
      abort(403);
    }
    return view('dashboard.articles.edit', [
      'article' => $article
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Article $article)
  {
    if ($article->user->id != auth()->user()->id) {
      abort(403);
    }
    $rules = [
      'title' => 'required|max:255',
      'slug' => 'required',
      'content' => 'required',
    ];

    if ($request->cover) {
      $rules['cover'] = 'image|file|required';
    }

    if ($request->oldImage != "article-covers/contoh-cover.jpg" && $request->cover) {
      Storage::delete($request->oldImage);
    }
    $validatedData = $request->validate($rules);
    if ($request->cover) {
      $validatedData['cover'] = $request->file('cover')->store('article-covers');
    } else $validatedData['cover'] = $request->oldImage;

    Article::where('id', $article->id)->update($validatedData);

    return redirect('/dashboard/articles')->with('success', 'Artikel berhasil diedit!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function destroy(Article $article)
  {
    if ($article->user->id != auth()->user()->id) {
      abort(403);
    }
    if ($article->image != "article-covers/contoh-cover.jpg") {
      Storage::delete($article->cover);
    }

    Article::destroy($article->id);

    return redirect('/dashboard/articles')->with('success', 'Artikel berhasil dihapus!');
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
    return response()->json(['slug' => $slug]);
  }
}
