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
      $table->string('slug')->unique();
      $table->string('price')->nullable();
      // $table->string('craftsman_name')->nullable();
      // $table->string('craftsman_contact')->nullable();
      // $table->text('craftsman_address')->nullable();
      $table->string('size')->nullable();
      $table->string('color')->nullable();
      $table->string('motive')->nullable();
      $table->timestamp('published_at')->nullable();
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
