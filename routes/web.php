<?php

use App\Http\Controllers\CraftController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;

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
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/detail/{craft:slug}', [CraftController::class, 'show']);
Route::get('/categories', function () {
  return view('categories', [
    'categories' => Category::all()
  ]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
  return view('category', [
    'crafts' => $category->crafts,
    'category' => $category->name
  ]);
});
Route::get('/craftsman/{category:slug}', function (Category $category) {
  return view('category', [
    'crafts' => $category->crafts,
    'category' => $category->name
  ]);
});
