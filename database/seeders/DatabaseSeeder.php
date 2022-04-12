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
    User::factory(5)->create();

    // User::create([
    //   'name' => 'Farah',
    //   'email' => 'farah@gmail.com',
    //   'password' => bcrypt('12345')
    // ]);

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
      'category_id' => 1,
      'user_id' => 1,
      'slug' => 'kebaya-panjang',
      'price' => 'Rp245.000',
      'size' => 'normal',
      'color' => 'yellow',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Tas Gendong',
      'category_id' => 2,
      'user_id' => 1,
      'slug' => 'tas-gendong',
      'price' => 'Rp45.000',
      'size' => 'normal',
      'color' => 'yellow',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Baju Adat',
      'category_id' => 1,
      'user_id' => 1,
      'slug' => 'baju-adat',
      'price' => 'Rp145.000',
      'size' => 'normal',
      'color' => 'yellow',
      'motive' => 'batik'
    ]);

    Craft::create([
      'title' => 'Kalung Antik',
      'category_id' => 3,
      'user_id' => 1,
      'slug' => 'kalung-antik',
      'price' => 'Rp105.000',
      'size' => 'normal',
      'color' => 'yellow',
      'motive' => 'batik'
    ]);
  }
}
