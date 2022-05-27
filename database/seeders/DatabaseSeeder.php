<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Craft;
use App\Models\User;
use App\Models\Category;

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

    User::factory(5)->create();


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
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 1,
      'price' => 'Rp245.000',
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Tas Gendong',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 1,
      'price' => 'Rp45.000',
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Baju Adat',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 2,
      'price' => 'Rp145.000',
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Kalung Antik',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 3,
      'user_id' => 2,
      'price' => 'Rp105.000',
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Tas Serut',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 1,
      'price' => 'Rp125.000',
      'size' => 'normal',
      'color' => 'kuning',
      'motive' => 'batik'
    ]);
  }
}
