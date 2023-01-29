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
      'name' => 'Admin Dekranasda KBB',
      'business_name' => 'Admin Dekranasda KBB',
      'username' => 'admindekranasdakbb',
      'email' => 'admindekranasdakbb@gmail.com',
      'password' => bcrypt('admin123'),
      'contact' => '0225678910',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "12345678910",

      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'dekranasdakbb',
      'instagram' => 'dekranasda.kbb',
      'whatsapp' => '0225678910',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => true,
      'is_admin' => true
    ]);

    User::create([
      'name' => 'Fahrio Ghanial',
      'business_name' => 'Fahrio Crafting',
      'username' => 'fahrioghanial',
      'email' => 'fahrioghanial@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '0895391719873',
      'address' => 'Jl. Angsana 4 no 10',
      'rt' => 5,
      'rw' => 20,
      'kodepos' => 40212,
      'noktp' => "3273112323123",
      'kecamatan' => "Margaasih",
      'kelurahan_desa' => "Lagadar",
      'facebook' => 'fahrioghanial',
      'instagram' => 'fahrioghanial',
      'whatsapp' => '0895391719873',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => true,
      'is_admin' => true
    ]);

    User::create([
      'name' => 'Restu Susanti',
      'business_name' => "Susanti Crafts",
      'username' => 'restu-susanti',
      'email' => 'restu@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '0895391711231',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311123132",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);


    User::create([
      'name' => 'Cici Riyanti',
      'business_name' => "Riyanti Crafts",
      'username' => 'cici-riyanti',
      'email' => 'cici@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '08953213276',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "3273111763762",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Agus Santoso',
      'business_name' => "Santoso Crafts",
      'username' => 'agus-santoso',
      'email' => 'agus@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '0895391235324',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311072845",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Ajimin Halim',
      'business_name' => "Halim Crafts",
      'username' => 'ajimin-halim',
      'email' => 'ajimin@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '089539172843',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311648592",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Jabal Nababan',
      'business_name' => "Nababan Crafts",
      'username' => 'jabal-nababan',
      'email' => 'jabal@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '0895391632742',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311759284",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Gambira Gunawan',
      'business_name' => "Gunawan Crafts",
      'username' => 'gambira-gunawan',
      'email' => 'gambira@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '08953963824',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311547231",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Kamaria Uyainah',
      'business_name' => "Uyainah Crafts",
      'username' => 'kamaria-uyainah',
      'email' => 'kamaria@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '089539198765',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311987642",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Bakda Maryadi',
      'business_name' => "Maryadi Crafts",
      'username' => 'bakda-maryadi',
      'email' => 'bakda@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '089539134572',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311876543",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Titin Latika',
      'business_name' => "Latika Crafts",
      'username' => 'titin-latika',
      'email' => 'titin@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '0895391856402',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311002342",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Icha Solihah',
      'business_name' => "Solihah Crafts",
      'username' => 'icha-solihah',
      'email' => 'icha@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '089539099082',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311098572",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Endang Darmaji',
      'business_name' => "Darmaji Crafts",
      'username' => 'endang-darmaji',
      'email' => 'endang@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '0895391098285',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "3273111098245",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Asep Jamaluddin',
      'business_name' => "Jamaluddin Crafts",
      'username' => 'asep-jamaluddin',
      'email' => 'asep@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '0895391890073',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311776842",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Jajang Supriyatna',
      'business_name' => "Supriyatna Crafts",
      'username' => 'jajang-supriyatna',
      'email' => 'jajang@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '089539187393',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311098173",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Burhan Muhandis',
      'business_name' => "Muhandis Crafts",
      'username' => 'burhan-muhandis',
      'email' => 'burhan@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '089539187743',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311332456",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Jamal Kosasih',
      'business_name' => "Kosasih Crafts",
      'username' => 'jamal-kosasih',
      'email' => 'jamal@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '089539776655',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311776492",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

    User::create([
      'name' => 'Dendi Suhendi',
      'business_name' => "Suhendi Crafts",
      'username' => 'dendi-suhendi',
      'email' => 'dendi@gmail.com',
      'password' => bcrypt('12345'),
      'contact' => '089539166583',
      'address' => 'Kabupaten Bandung Barat',
      'rt' => 1,
      'rw' => 1,
      'kodepos' => 40552,
      'noktp' => "327311887353",
      'kecamatan' => "Ngamprah",
      'kelurahan_desa' => "Ngamprah",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '085123456789',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'status_keanggotaan' => false,
      'is_admin' => false
    ]);

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
      'user_id' => 1,
      'title' => 'Artikel 3 Dekranasda KBB',
      'slug' => 'artikel-3-dekranasda-kbb',
      'cover' => 'article-covers/contoh-cover.jpg',
      'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis ante sed enim accumsan mattis. Vivamus convallis odio in enim tristique, quis maximus nulla dapibus. Morbi mollis purus nec nunc gravida, sit amet lobortis mauris convallis. Aenean viverra hendrerit neque in consequat. Sed et volutpat urna. Etiam in facilisis elit. Etiam imperdiet iaculis felis a volutpat. Mauris mattis at ex nec aliquam.
      In non placerat diam. Suspendisse quis ipsum a metus tempus congue. Ut pharetra finibus posuere. Aliquam eleifend neque id nulla imperdiet pharetra. Suspendisse in tellus ut mauris venenatis scelerisque. Vivamus pulvinar, leo vitae dapibus mattis, nulla eros rutrum quam, ut sollicitudin ante odio ac elit. Phasellus augue urna, venenatis at dolor vel, posuere sagittis risus. Vivamus vitae auctor nulla, quis luctus nisl. Suspendisse laoreet, turpis dictum semper scelerisque, dui ipsum cursus diam, ac cursus lorem orci nec dui. Donec semper leo sit amet mauris malesuada hendrerit et a elit."
    ]);

    Article::create([
      'user_id' => 2,
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

    Category::create([
      'name' => 'Pajangan',
      'slug' => 'pajangan'
    ]);

    Craft::create([
      'title' => 'Kebaya Panjang',
      'slug' => 'kebaya-panjang',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 1,
      'price' => '245000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Jaket Tenun',
      'slug' => 'jaket-tenun',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 2,
      'price' => '345000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Sarung Sunda',
      'slug' => 'sarung-sunda',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 3,
      'price' => '125000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Baju Adat',
      'slug' => 'baju-adat',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 4,
      'price' => '145000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Outer Batik',
      'slug' => 'outer-batik',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 1,
      'user_id' => 5,
      'price' => '125000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Tas Gendong',
      'slug' => 'tas-gendong',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 3,
      'price' => '45000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Tas Serut',
      'slug' => 'tas-serut',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 3,
      'price' => '25000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Tas Anyam',
      'slug' => 'tas-anyam',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 3,
      'price' => '35000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Tas Punggung',
      'slug' => 'tas-punggung',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 3,
      'price' => '75000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Tas Selempang',
      'slug' => 'tas-selempang',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 2,
      'user_id' => 4,
      'price' => '15000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Kalung Antik',
      'slug' => 'kalung-antik',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 3,
      'user_id' => 4,
      'price' => '505000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Kalung Tanduk',
      'slug' => 'kalung-tanduk',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 3,
      'user_id' => 5,
      'price' => '825000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Bros Mutiara',
      'slug' => 'bros-mutiara',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 3,
      'user_id' => 6,
      'price' => '325000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Cincin Batu',
      'slug' => 'cincin-batu',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 3,
      'user_id' => 7,
      'price' => '125000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Gelang Mutiara',
      'slug' => 'gelang-mutiara',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 3,
      'user_id' => 8,
      'price' => '205000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Patung Kuda Kayu',
      'slug' => 'patung-kuda-kayu',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 4,
      'user_id' => 9,
      'price' => '465000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Patung Bebek Kayu',
      'slug' => 'patung-bebek-kayu',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 4,
      'user_id' => 10,
      'price' => '225000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Patung Singa Kayu',
      'slug' => 'patung-singa-kayu',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 4,
      'user_id' => 11,
      'price' => '525000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Mobil Mobilan',
      'slug' => 'mobil-mobilan',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 4,
      'user_id' => 12,
      'price' => '525000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);

    Craft::create([
      'title' => 'Kapal kapalan',
      'slug' => 'kapal-kapalan',
      'image' => 'craft-images/contoh-foto.jpg',
      'category_id' => 4,
      'user_id' => 13,
      'price' => '525000',
      'views' => 0,
      'description' => 'ini adalah deskripsi produk'
    ]);
  }
}
