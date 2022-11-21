<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('username')->unique();
      $table->string('email')->unique();
      $table->string('contact');
      $table->text('address');
      $table->string('noktp')->unique();
      $table->integer('rt');
      $table->integer('rw');
      $table->string('kecamatan');
      $table->integer('kodepos');
      $table->string('kelurahan_desa');
      $table->string('profile_picture');
      $table->boolean('status_keanggotaan')->default(false);
      $table->boolean('is_admin')->default(false);
      $table->string('facebook')->nullable();
      $table->string('instagram')->nullable();
      $table->string('whatsapp')->nullable();
      $table->string('password');
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
};
