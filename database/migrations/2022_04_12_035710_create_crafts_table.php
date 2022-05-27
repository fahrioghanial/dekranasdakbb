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
    Schema::create('crafts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('category_id');
      $table->foreignId('user_id');
      $table->string('title');
      $table->string('image')->nullable();
      $table->string('price')->nullable();
      $table->string('size')->nullable();
      $table->string('color')->nullable();
      $table->string('motive')->nullable();
      $table->boolean('is_confirmed')->default(false);
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
    Schema::dropIfExists('crafts');
  }
};
