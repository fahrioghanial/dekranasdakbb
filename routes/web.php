<?php

use App\Http\Controllers\CraftController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardCraftController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Models\Craft;
use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('index');
});
Route::get('/info', function () {
  return view('info');
});
Route::get('/benefit', function () {
  return view('benefit');
});
Route::get('/howto', function () {
  return view('howto');
});
Route::get('/contact', function () {
  return view('contact');
});
Route::get('/aboutus', function () {
  return view('about');
});
Route::get('/organization', function () {
  return view('organization');
});
Route::get('/crafts', [CraftController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/detail/{craft}', [CraftController::class, 'show']);

Route::get('/member', function () {
  return view('member', [
    'users' => User::where('status_keanggotaan', 1)->get(),
  ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
  return view('crafts', [
    'title' => "Kategori kerajinan: $category->name",
    'crafts' => $category->crafts->load(['craftsman', 'category'])->where('is_confirmed', 1),
    'categories' => Category::all()
  ]);
});

Route::get('/craftsman/{craftsman:username}', function (User $craftsman) {
  return view('crafts', [
    'title' => "Kerajinan oleh: $craftsman->name",
    'crafts' => $craftsman->crafts->load(['craftsman', 'category'])->where('is_confirmed', 1),
    'categories' => Category::all()
  ]);
});

// Routes for dashboard

Route::get('/dashboard', function () {
  return view('dashboard.index');
})->middleware('auth');


Route::resource('/dashboard/user', ProfileController::class)->middleware('auth');

Route::resource('/dashboard/crafts', DashboardCraftController::class)->middleware('member');

// Routes for dashboard admin
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');
Route::get('/dashboard/craftsadmin', function () {
  return view('dashboard.crafts.admin', [
    "crafts" => Craft::with(['craftsman', 'category'])->latest()->get()
  ]);
})->middleware('admin');
Route::get('/dashboard/craftsadmin/{craft}', function (Craft $craft) {
  return view('dashboard.crafts.adminshow', [
    "craft" => $craft
  ]);
})->middleware('admin');

Route::get('/dashboard/crafts/admin/{craft}', [DashboardCraftController::class, 'admin'])->middleware('admin');
Route::get('/dashboard/confirmallcrafts', [DashboardCraftController::class, 'confirmAll'])->middleware('admin');

Route::get('/dashboard/adminuser', function () {
  return view('dashboard.craftsmanadmin.index', [
    "users" => User::latest()->get()
  ]);
})->middleware('admin');
Route::get('/dashboard/adminuser/{user:username}', function (User $user) {
  return view('dashboard.craftsmanadmin.show', [
    "user" => $user
  ]);
})->middleware('admin');

Route::get('/dashboard/adminuser/membership/confirmall', function () {
  $validatedData = [
    'status_keanggotaan' => ''
  ];
  $validatedData['status_keanggotaan'] = true;
  User::where('status_keanggotaan', 0)->update($validatedData);
  return redirect('/dashboard/adminuser')->with('success', 'Semua perajin berhasil diterima!');
})->middleware('admin');

Route::get('/dashboard/adminuser/membership/{user:username}', function (User $user) {
  $validatedData = [
    'status_keanggotaan' => ''
  ];
  if ($user->status_keanggotaan) {
    $validatedData['status_keanggotaan'] = false;
    User::where('id', $user->id)->update($validatedData);
    return redirect('/dashboard/adminuser')->with('success', 'Keanggotaan perajin berhasil dicabut!');
  } else {
    $validatedData['status_keanggotaan'] = true;
    User::where('id', $user->id)->update($validatedData);
    return redirect('/dashboard/adminuser')->with('success', 'Keanggotaan perajin berhasil diterima!');
  }
})->middleware('admin');
