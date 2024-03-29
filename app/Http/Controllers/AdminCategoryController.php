<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Craft;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('dashboard.categories.index', [
      'categories' => Category::withCount('crafts')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('dashboard.categories.create');
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
      'name' => 'required|unique:categories',
      'slug' => 'required',
    ]);

    Category::create($validatedData);

    return redirect('/dashboard/categories')->with('success', 'Kategori berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    return view('dashboard.categories.edit', [
      'category' => $category
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    $validatedData = $request->validate([
      'name' => 'required|unique:categories',
      'slug' => 'required',
    ]);

    Category::where('id', $category->id)->update($validatedData);

    return redirect('/dashboard/categories')->with('success', 'Kategori berhasil diedit!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    try {
      Category::destroy($category->id);
    } catch (\Throwable $th) {
      return redirect('/dashboard/categories')->with('error', 'Kategori yang memiliki produk tidak dapat dihapus!');
    }
    return redirect('/dashboard/categories')->with('success', 'Kategori berhasil dihapus!');
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
    return response()->json(['slug' => $slug]);
  }
}
