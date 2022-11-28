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
      $table->string('image')->nullable();
      $table->integer('price')->nullable();
      $table->integer('views')->nullable();
      $table->text('description')->nullable();
      $table->boolean('is_confirmed')->default(false);
      $table->foreignId('updated_by')->nullable()->constrained('users');
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
