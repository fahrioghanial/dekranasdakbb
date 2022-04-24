<?php

namespace App\Http\Controllers;

use App\Models\Craft;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardCraftController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $crafts = Craft::where('user_id', auth()->user()->id)->get();
    return view('dashboard.crafts.index', [
      'crafts' => $crafts
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('dashboard.crafts.create', [
      'categories' => Category::all()
    ]);
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
      'image' => 'image|file|required',
      'title' => 'required|max:255',
      'category_id' => 'required',
      'price' => 'required',
      'size' => '',
      'color' => '',
      'motive' => '',
    ]);

    $validatedData['image'] = $request->file('image')->store('craft-images');
    $validatedData['user_id'] = auth()->user()->id;

    Craft::create($validatedData);

    return redirect('/dashboard/crafts')->with('success', 'Kerajinan berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Craft  $craft
   * @return \Illuminate\Http\Response
   */
  public function show(Craft $craft)
  {
    return view('dashboard.crafts.show', [
      'craft' => $craft
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Craft  $craft
   * @return \Illuminate\Http\Response
   */
  public function edit(Craft $craft)
  {
    // dd($craft);
    return view('dashboard.crafts.edit', [
      'craft' => $craft,
      'categories' => Category::all()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Craft  $craft
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Craft $craft)
  {
    $validatedData = $request->validate([
      'image' => 'image|file|required',
      'title' => 'required|max:255',
      'category_id' => 'required',
      'price' => 'required',
      'size' => '',
      'color' => '',
      'motive' => '',
    ]);

    if ($request->oldImage != "craft-images/contoh-foto.jpg") {
      Storage::delete($request->oldImage);
    }
    $validatedData['image'] = $request->file('image')->store('craft-images');
    $validatedData['user_id'] = auth()->user()->id;

    Craft::where('id', $craft->id)->update($validatedData);

    return redirect('/dashboard/crafts')->with('success', 'Kerajinan berhasil diedit!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Craft  $craft
   * @return \Illuminate\Http\Response
   */
  public function destroy(Craft $craft)
  {
    if ($craft->image != "craft-images/contoh-foto.jpg") {
      Storage::delete($craft->image);
    }

    Craft::destroy($craft->id);

    return redirect('/dashboard/crafts')->with('success', 'Kerajinan berhasil dihapus!');
  }
}
