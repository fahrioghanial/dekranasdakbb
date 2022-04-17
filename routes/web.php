<?php

use App\Http\Controllers\CraftController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardCraftController;
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

Route::get('/', [CraftController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/detail/{craft}', [CraftController::class, 'show']);
Route::get('/categories', function () {
  return view('categories', [
    'categories' => Category::all()
  ]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
  return view('crafts', [
    'title' => "Kategori kerajinan: $category->name",
    'crafts' => $category->crafts->load(['craftsman', 'category'])
  ]);
});
Route::get('/craftsman/{craftsman:username}', function (User $craftsman) {
  return view('crafts', [
    'title' => "Kerajinan oleh: $craftsman->name",
    'crafts' => $craftsman->crafts->load(['craftsman', 'category'])
  ]);
});

Route::get('/dashboard', function () {
  return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/crafts', DashboardCraftController::class)->middleware('auth');
