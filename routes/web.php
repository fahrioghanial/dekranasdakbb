<?php

use App\Exports\CraftsExport;
use App\Http\Controllers\CraftController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardCraftController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminArticleController;
use App\Models\Craft;
use App\Models\Category;
use App\Models\User;
use App\Models\Article;
use App\Models\WebViewerCount;
use App\Exports\UsersExport;
use App\Models\UpdateHistory;
use Maatwebsite\Excel\Facades\Excel;

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
  $count = WebViewerCount::first();
  return view('index', [
    'web_viewer_count' => $count,
  ]);
});
Route::get('/test', function () {
  $user = User::latest()->first();
  $updateHistory = UpdateHistory::where('user_id', $user->id)->latest()->first();
  dd($updateHistory->admin->name);
});

Route::get('/contact', function () {
  if (url()->previous() == url("/") . "/") {
    if (WebViewerCount::first() == null) {
      $data['count'] = 1;
      WebViewerCount::create($data);
    } else {
      WebViewerCount::first()->increment('count');
    }
  }
  return view('contact');
});
Route::get('/aboutus', function () {
  if (url()->previous() == url("/") . "/") {
    if (WebViewerCount::first() == null) {
      $data['count'] = 1;
      WebViewerCount::create($data);
    } else {
      WebViewerCount::first()->increment('count');
    }
  }
  return view('about');
});

Route::get('/crafts', [CraftController::class, 'index']);
Route::get('/crafts/detail/{craft:slug}', [CraftController::class, 'show']);

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/login/forgotpassword', [LoginController::class, 'showForgotForm'])->middleware('guest');
Route::post('/login/forgotpassword', [LoginController::class, 'sendResetLink']);
Route::get('/login/resetpassword/{token}', [LoginController::class, 'showResetForm'])->middleware('guest')->name('resetpassword');
Route::post('/login/resetpassword', [LoginController::class, 'resetPassword']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/username/checkUsername', [RegisterController::class, 'checkUsername']);

Route::get('/member', function () {
  if (url()->previous() == url("/") . "/") {
    if (WebViewerCount::first() == null) {
      $data['count'] = 1;
      WebViewerCount::create($data);
    } else {
      WebViewerCount::first()->increment('count');
    }
  }

  $users = User::where('status_keanggotaan', 1);
  $title = "Semua Anggota Perajin Dekranasda";

  if (request('search')) {
    $users->where('name', 'like', '%' . request('search') . '%');
    $title = "Pencarian: " . request('search');
  }
  return view('member', [
    'title' => $title,
    'users' => $users->paginate(12)->withQueryString(),
  ]);
});



// Routes for dashboard
Route::resource('/dashboard/user', ProfileController::class)->middleware('auth');

Route::get('/dashboard/crafts/checkSlug', [DashboardCraftController::class, 'checkSlug'])->middleware('member');
Route::resource('/dashboard/crafts', DashboardCraftController::class)->middleware('member');


// Routes for dashboard admin
// Admin statistik
Route::get('/dashboard/statistics', function () {
  $max_count_crafts_in_category = Category::withCount('crafts')->get()->max('crafts_count');
  $min_count_crafts_in_category = Category::withCount('crafts')->get()->min('crafts_count');
  $max_count_crafts_in_user = User::withCount('crafts')->get()->max('crafts_count');
  $min_count_crafts_in_user = User::withCount('crafts')->get()->min('crafts_count');
  $highest_price = Craft::get()->max('price');
  $lowest_price = Craft::get()->min('price');
  $highest_views = Craft::get()->max('views');
  $lowest_views = Craft::get()->min('views');
  $category_with_highest_product = Category::withCount('crafts')->get()->where('crafts_count', $max_count_crafts_in_category);
  $category_with_lowest_product = Category::withCount('crafts')->get()->where('crafts_count', $min_count_crafts_in_category);
  $craftsman_with_highest_product = User::withCount('crafts')->get()->where('crafts_count', $max_count_crafts_in_user);
  $craftsman_with_lowest_product = User::withCount('crafts')->get()->where('crafts_count', $min_count_crafts_in_user);
  $expensive_product = Craft::get()->where('price', $highest_price);
  $cheap_product = Craft::get()->where('price', $lowest_price);
  $most_viewed_product = Craft::get()->where('views', $highest_views);
  $less_viewed_product = Craft::get()->where('views', $lowest_views);
  $count = WebViewerCount::first();

  return view('dashboard.statistics', [
    "craftsman_total" => User::all()->count(),
    "craft_total" => Craft::all()->count(),
    "category_total" => Category::all()->count(),
    "view_total" => Craft::get()->sum('views'),
    "article_total" => Article::all()->count(),
    "category_with_highest_product" => $category_with_highest_product,
    "category_with_lowest_product" => $category_with_lowest_product,
    "craftsman_with_highest_product" => $craftsman_with_highest_product,
    "craftsman_with_lowest_product" => $craftsman_with_lowest_product,
    "expensive_product" => $expensive_product,
    "cheap_product" => $cheap_product,
    "most_viewed_product" => $most_viewed_product,
    "less_viewed_product" => $less_viewed_product,
    'web_viewer_count' => $count,
  ]);
})->middleware('admin');

// Admin data kategori
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');



// Admin data produk kerajinan
Route::get('/dashboard/craftsadmin/confirmallcrafts', [DashboardCraftController::class, 'confirmAll'])->middleware('admin');
Route::get('/dashboard/craftsadmin', function () {
  return view('dashboard.crafts.adminindex', [
    "crafts" => Craft::with(['craftsman', 'category'])->latest()->get()
  ]);
})->middleware('admin');
Route::get('/dashboard/craftsadmin/export', function () {
  return Excel::download(new CraftsExport, 'data-produk.xlsx');
})->middleware('admin');
Route::get('/dashboard/craftsadmin/createcraft/{user:username}', function (User $user) {
  return view('dashboard.crafts.admincreatecraft', [
    "user" => $user,
    'categories' => Category::all()
  ]);
})->middleware('admin');
Route::get('/dashboard/craftsadmin/editcraft/{craft}', function (Craft $craft) {
  return view('dashboard.crafts.admineditcraft', [
    "craft" => $craft,
    'categories' => Category::all()
  ]);
})->middleware('admin');
Route::post('/dashboard/craftsadmin/createcraft', [DashboardCraftController::class, 'adminCreateCraft'])->middleware('admin');
Route::put('/dashboard/craftsadmin/editcraft/{craft}', [DashboardCraftController::class, 'adminEditCraft'])->middleware('admin');
Route::delete('/dashboard/craftsadmin/deletecraft/{craft}', [DashboardCraftController::class, 'adminDeleteCraft'])->middleware('admin');
Route::get('/dashboard/craftsadmin/{craft}', function (Craft $craft) {
  return view('dashboard.crafts.adminshow', [
    "craft" => $craft
  ]);
})->middleware('admin');
Route::get('/dashboard/craftsadmin/isconfirmed/{craft}', [DashboardCraftController::class, 'craftConfirm'])->middleware('admin');



// Admin data anggota perajin
Route::get('/dashboard/adminuser', function () {
  return view('dashboard.craftsmanadmin.index', [
    "users" => User::withCount('crafts')->latest()->get(),
    'update_histories' => UpdateHistory::latest()->get(),
  ]);
})->middleware('admin');
Route::get('/dashboard/adminuser/export', function () {
  return Excel::download(new UsersExport, 'data-perajin.xlsx');
})->middleware('admin');
Route::get('/dashboard/adminuser/adduser', function () {
  return view('dashboard.craftsmanadmin.create');
})->middleware('admin');
Route::post('/dashboard/adminuser/adduser', [RegisterController::class, 'adminAddUser'])->middleware('admin');
Route::get('/dashboard/adminuser/edituser/{user:username}', function (User $user) {
  return view('dashboard.craftsmanadmin.edit', [
    "user" => $user
  ]);
})->middleware('admin');
Route::put('/dashboard/adminuser/edituser/{user:username}', [ProfileController::class, 'adminEditUser'])->middleware('admin');
Route::delete('/dashboard/adminuser/delete/{user:username}', [ProfileController::class, 'adminDeleteUser'])->middleware('admin');
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
  Craft::where('is_confirmed', 0)->update(['is_confirmed' => true]);
  return redirect('/dashboard/adminuser')->with('success', 'Semua perajin berhasil diterima!');
})->middleware('admin');
Route::get('/dashboard/adminuser/membership/{user:username}', function (User $user) {
  if ($user->status_keanggotaan) {
    User::where('id', $user->id)->update(['status_keanggotaan' => false]);
    Craft::where('user_id', $user->id)->update(['is_confirmed' => false]);
    return redirect('/dashboard/adminuser')->with('success', 'Keanggotaan perajin berhasil dicabut!');
  } else {
    User::where('id', $user->id)->update(['status_keanggotaan' => true]);
    Craft::where('user_id', $user->id)->update(['is_confirmed' => true]);
    return redirect('/dashboard/adminuser')->with('success', 'Keanggotaan perajin berhasil diterima!');
  }
})->middleware('admin');



// Admin Artikel
Route::get('/dashboard/articles/checkSlug', [AdminArticleController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/articles', AdminArticleController::class)->middleware('admin');
Route::get('/dashboard/publish-article/publishall', function () {
  $validatedData = [
    'is_show' => ''
  ];
  $validatedData['is_show'] = true;
  Article::where('is_show', 0)->where('user_id', auth()->user()->id)->update($validatedData);
  return redirect('/dashboard/articles')->with('success', 'Semua artikel berhasil dipublikasikan!');
})->middleware('admin');

Route::get('/dashboard/publish-article/{article}', function (Article $article) {
  $validatedData = [
    'is_show' => ''
  ];
  if ($article->is_show) {
    $validatedData['is_show'] = false;
    Article::where('id', $article->id)->update($validatedData);
    return redirect('/dashboard/articles')->with('success', 'Artikel berhasil disembunyikan!');
  } else {
    $validatedData['is_show'] = true;
    Article::where('id', $article->id)->update($validatedData);
    return redirect('/dashboard/articles')->with('success', 'Artikel berhasil dipublikasikan!');
  }
})->middleware('admin');
