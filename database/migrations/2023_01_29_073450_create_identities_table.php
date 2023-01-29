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
    Schema::create('identities', function (Blueprint $table) {
      $table->id();
      $table->string('phone');
      $table->text('address');
      $table->string('noktp')->unique();
      $table->integer('rt');
      $table->integer('rw');
      $table->string('profile_picture');
      $table->string('facebook')->nullable();
      $table->string('instagram')->nullable();
      $table->string('whatsapp')->nullable();
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
    Schema::dropIfExists('identities');
  }
};
