<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Craft;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use App\Models\WebViewerCount;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'name' => 'Fahrio Ghanial',
      'username' => 'fahrioghanial',
      'email' => 'fahrioghanial@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '085324XXXXXX',
      'address' => 'Jl. Angsana 4 no 10',
      'rt' => 5,
      'rw' => 20,
      'kodepos' => 40212,
      'noktp' => "3273112323123",
      'kecamatan' => "Margaasih",
      'kelurahan_desa' => "Lagadar",
      'facebook' => '@fahrioghanial',
      'instagram' => '@fahrioghanial',
      'twitter' => '@fahrioghanial',
      'profile_picture' => 'profile-pictures/contoh-foto.png',
      'status_keanggotaan' => true,
      'is_admin' => true
    ]);

    User::factory(15)->create();

    Article::create([
      'user_id' => 1,
      'title' => 'Artikel 1 Dekranasda KBB',
      'slug' => 'artikel-1-dekranasda-kbb',
      'cover' => 'article-covers/contoh-cover.jpg',
      'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis ante sed enim accumsan mattis. Vivamus convallis odio in enim tristique, quis maximus nulla dapibus. Morbi mollis purus nec nunc gravida, sit amet lobortis mauris convallis. Aenean viverra hendrerit neque in consequat. Sed et volutpat urna. Etiam in facilisis elit. Etiam imperdiet iaculis felis a volutpat. Mauris mattis at ex nec aliquam.
      In non placerat diam. Suspendisse quis ipsum a metus tempus congue. Ut pharetra finibus posuere. Aliquam eleifend neque id nulla imperdiet pharetra. Suspendisse in tellus ut mauris venenatis scelerisque. Vivamus pulvinar, leo vitae dapibus mattis, nulla eros rutrum quam, ut sollicitudin ante odio ac elit. Phasellus augue urna, venenatis at dolor vel, posuere sagittis risus. Vivamus vitae auctor nulla, quis luctus nisl. Suspendisse laoreet, turpis dictum semper scelerisque, dui ipsum cursus diam, ac cursus lorem orci nec dui. Donec semper leo sit amet mauris malesuada hendrerit et a elit."
    ]);

    Article::create([
      'user_id' => 1,
      'title' => 'Artikel 2 Dekranasda KBB',
      'slug' => 'artikel-2-dekranasda-kbb',
      'cover' => 'article-covers/contoh-cover.jpg',
      'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis ante sed enim accumsan mattis. Vivamus convallis odio in enim tristique, quis maximus nulla dapibus. Morbi mollis purus nec nunc gravida, sit amet lobortis mauris convallis. Aenean viverra hendrerit neque in consequat. Sed et volutpat urna. Etiam in facilisis elit. Etiam imperdiet iaculis felis a volutpat. Mauris mattis at ex nec aliquam.
      In non placerat diam. Suspendisse quis ipsum a metus tempus congue. Ut pharetra finibus posuere. Aliquam eleifend neque id nulla imperdiet pharetra. Suspendisse in tellus ut mauris venenatis scelerisque. Vivamus pulvinar, leo vitae dapibus mattis, nulla eros rutrum quam, ut sollicitudin ante odio ac elit. Phasellus augue urna, venenatis at dolor vel, posuere sagittis risus. Vivamus vitae auctor nulla, quis luctus nisl. Suspendisse laoreet, turpis dictum semper scelerisque, dui ipsum cursus diam, ac cursus lorem orci nec dui. Donec semper leo sit amet mauris malesuada hendrerit et a elit."
    ]);

    Article::create([
      'user_id' => 2,
      'title' => 'Artikel 3 Dekranasda KBB',
      'slug' => 'artikel-3-dekranasda-kbb',
      'cover' => 'article-covers/contoh-cover.jpg',
      'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis ante sed enim accumsan mattis. Vivamus convallis odio in enim tristique, quis maximus nulla dapibus. Morbi mollis purus nec nunc gravida, sit amet lobortis mauris convallis. Aenean viverra hendrerit neque in consequat. Sed et volutpat urna. Etiam in facilisis elit. Etiam imperdiet iaculis felis a volutpat. Mauris mattis at ex nec aliquam.
      In non placerat diam. Suspendisse quis ipsum a metus tempus congue. Ut pharetra finibus posuere. Aliquam eleifend neque id nulla imperdiet pharetra. Suspendisse in tellus ut mauris venenatis scelerisque. Vivamus pulvinar, leo vitae dapibus mattis, nulla eros rutrum quam, ut sollicitudin ante odio ac elit. Phasellus augue urna, venenatis at dolor vel, posuere sagittis risus. Vivamus vitae auctor nulla, quis luctus nisl. Suspendisse laoreet, turpis dictum semper scelerisque, dui ipsum cursus diam, ac cursus lorem orci nec dui. Donec semper leo sit amet mauris malesuada hendrerit et a elit."
    ]);

    Article::create([
      'user_id' => 1,
      'title' => 'Artikel 4 Dekranasda KBB',
      'slug' => 'artikel-4-dekranasda-kbb',
      'cover' => 'article-covers/contoh-cover.jpg',
      'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis ante sed enim accumsan mattis. Vivamus convallis odio in enim tristique, quis maximus nulla dapibus. Morbi mollis purus nec nunc gravida, sit amet lobortis mauris convallis. Aenean viverra hendrerit neque in consequat. Sed et volutpat urna. Etiam in facilisis elit. Etiam imperdiet iaculis felis a volutpat. Mauris mattis at ex nec aliquam.
      In non placerat diam. Suspendisse quis ipsum a metus tempus congue. Ut pharetra finibus posuere. Aliquam eleifend neque id nulla imperdiet pharetra. Suspendisse in tellus ut mauris venenatis scelerisque. Vivamus pulvinar, leo vitae dapibus mattis, nulla eros rutrum quam, ut sollicitudin ante odio ac elit. Phasellus augue urna, venenatis at dolor vel, posuere sagittis risus. Vivamus vitae auctor nulla, quis luctus nisl. Suspendisse laoreet, turpis dictum semper scelerisque, dui ipsum cursus diam, ac cursus lorem orci nec dui. Donec semper leo sit amet mauris malesuada hendrerit et a elit."
    ]);


    Category::create([
      'name' => 'Pakaian',
      'slug' => 'pakaian'
    ]);

    Category::create([
      'name' => 'Tas',
      'slug' => 'tas'
    ]);

    Category::create([
      'name' => 'Perhiasan',
      'slug' => 'perhiasan'
    ]);

    Craft::create([
      'title' => 'Kebaya Panjang',
      'slug' => 'kebaya-panjang',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 1,
      'price' => '245000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Tas Gendong',
      'slug' => 'tas-gendong',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 1,
      'price' => '45000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Baju Adat',
      'slug' => 'baju-adat',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 2,
      'price' => '145000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Kalung Antik',
      'slug' => 'kalung-antik',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 3,
      'user_id' => 2,
      'price' => '105000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Tas Serut',
      'slug' => 'tas-serut',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 1,
      'price' => '125000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Outer Tenun',
      'slug' => 'outer-tenun',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 3,
      'price' => '125000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Kalung Tanduk',
      'slug' => 'kalung-tanduk',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 3,
      'user_id' => 4,
      'price' => '125000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Kimono Tenun',
      'slug' => 'kimono-tenun',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 5,
      'price' => '625000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Kalung Scarf',
      'slug' => 'kalung-scarf',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 3,
      'user_id' => 6,
      'price' => '25000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Sarung Sunda',
      'slug' => 'sarung-sunda',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 1,
      'price' => '205000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Totebag Klasik',
      'slug' => 'totebag-klasik',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 3,
      'price' => '335000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Pouch Anyam',
      'slug' => 'pouch-anyam',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 8,
      'price' => '335000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Tas Pinggang Anyam',
      'slug' => 'tas-pinggang-anyam',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 1,
      'price' => '135000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Kemeja Batik Tulis',
      'slug' => 'kemeja-batik-tulis',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 4,
      'price' => '235000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Celana Tenun',
      'slug' => 'celana-tenun',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 6,
      'price' => '105000',
      'views' => 0,
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    WebViewerCount::create([
      'count' => 0,
    ]);
  }
}
