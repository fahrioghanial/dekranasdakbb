<?php

namespace App\Http\Controllers;

use App\Models\Craft;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
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
      'slug' => 'required',
      'category_id' => 'required',
      'price' => [
        'required', 'numeric',
        function ($attribute, $value, $fail) {
          if (str_contains($value, '.')) {
            $fail('Pastikan format sesuai dengan contoh!');
          }
        },
      ],
      'description' => 'required'
    ]);


    $validatedData['image'] = $request->file('image')->store('craft-images');
    $validatedData['user_id'] = auth()->user()->id;
    $validatedData['views'] = 0;

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
    if ($craft->craftsman->id != auth()->user()->id) {
      abort(403);
    }
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
    if ($craft->craftsman->id != auth()->user()->id) {
      abort(403);
    }
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
    if ($craft->craftsman->id != auth()->user()->id) {
      abort(403);
    }
    $rules = [
      // 'image' => 'image|file|required',
      'title' => 'required|max:255',
      'slug' => 'required',
      'category_id' => 'required',
      'price' => [
        'required', 'numeric',
        function ($attribute, $value, $fail) {
          if (str_contains($value, '.')) {
            $fail('Pastikan format sesuai dengan contoh!');
          }
        },
      ],
      'description' => 'required',
    ];

    if ($request->image) {
      $rules['image'] = 'image|file|required';
    }

    if ($request->oldImage != "craft-images/contoh-foto.jpg" && $request->image) {
      Storage::delete($request->oldImage);
    }
    $validatedData = $request->validate($rules);
    if ($request->image) {
      $validatedData['image'] = $request->file('image')->store('craft-images');
    } else $validatedData['image'] = $request->oldImage;

    $validatedData['updated_by'] = auth()->user()->id;

    Craft::where('id', $craft->id)->update($validatedData);

    return redirect('/dashboard/crafts')->with('success', 'Kerajinan berhasil diubah!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Craft  $craft
   * @return \Illuminate\Http\Response
   */
  public function destroy(Craft $craft)
  {
    if ($craft->craftsman->id != auth()->user()->id) {
      abort(403);
    }
    if ($craft->image != "craft-images/contoh-foto.jpg") {
      Storage::delete($craft->image);
    }

    Craft::destroy($craft->id);

    return redirect('/dashboard/crafts')->with('success', 'Kerajinan berhasil dihapus!');
  }

  public function craftConfirm(Craft $craft)
  {
    $validatedData = [
      'is_confirmed' => ''
    ];
    if ($craft->is_confirmed) {
      $validatedData['is_confirmed'] = false;
      Craft::where('id', $craft->id)->update($validatedData);
      return redirect('/dashboard/craftsadmin')->with('success', 'Izin kerajinan berhasil dihapus!');
    } else {
      $validatedData['is_confirmed'] = true;
      Craft::where('id', $craft->id)->update($validatedData);
      return redirect('/dashboard/craftsadmin')->with('success', 'Kerajinan berhasil disetujui!');
    }
  }

  public function confirmAll()
  {
    $validatedData = [
      'is_confirmed' => ''
    ];
    $validatedData['is_confirmed'] = true;
    Craft::where('is_confirmed', 0)->update($validatedData);
    return redirect('/dashboard/craftsadmin')->with('success', 'Semua kerajinan berhasil disetujui!');
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(Craft::class, 'slug', $request->title);
    return response()->json(['slug' => $slug]);
  }

  public function adminCreateCraft(Request $request)
  {
    $validatedData = $request->validate([
      'image' => 'image|file|required',
      'title' => 'required|max:255',
      'user_id' => '',
      'slug' => 'required',
      'category_id' => 'required',
      'price' => [
        'required', 'numeric',
        function ($attribute, $value, $fail) {
          if (str_contains($value, '.')) {
            $fail('Pastikan format sesuai dengan contoh!');
          }
        },
      ],
      'description' => 'required'
    ]);

    $validatedData['image'] = $request->file('image')->store('craft-images');
    $validatedData['views'] = 0;
    $validatedData['is_confirmed'] = true;
    $validatedData['updated_by'] = auth()->user()->id;

    Craft::create($validatedData);

    return redirect('/dashboard/craftsadmin')->with('success', 'Kerajinan atas nama ' . $request->name . ' berhasil ditambahkan!');
  }

  public function adminEditCraft(Request $request, Craft $craft)
  {
    $rules = [
      // 'image' => 'image|file|required',
      'title' => 'required|max:255',
      'slug' => 'required',
      'category_id' => 'required',
      'price' => [
        'required', 'numeric',
        function ($attribute, $value, $fail) {
          if (str_contains($value, '.')) {
            $fail('Pastikan format sesuai dengan contoh!');
          }
        },
      ],
      'description' => 'required',
    ];

    if ($request->image) {
      $rules['image'] = 'image|file|required';
    }

    if ($request->oldImage != "craft-images/contoh-foto.jpg" && $request->image) {
      Storage::delete($request->oldImage);
    }
    $validatedData = $request->validate($rules);
    if ($request->image) {
      $validatedData['image'] = $request->file('image')->store('craft-images');
    } else $validatedData['image'] = $request->oldImage;

    $validatedData['updated_by'] = auth()->user()->id;

    Craft::where('id', $craft->id)->update($validatedData);

    return redirect('/dashboard/craftsadmin')->with('success', 'Kerajinan berhasil diubah!');
  }

  public function adminDeleteCraft(Craft $craft)
  {
    if ($craft->image != "craft-images/contoh-foto.jpg") {
      Storage::delete($craft->image);
    }

    Craft::destroy($craft->id);

    return redirect('/dashboard/craftsadmin')->with('success', 'Kerajinan berhasil dihapus!');
  }
}
