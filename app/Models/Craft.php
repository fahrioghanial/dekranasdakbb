<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Craft extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'category_id', 'user_id', 'slug', 'price', 'craftsman_name', 'craftsman_contact', 'craftsman_address', 'size', 'color', 'motive'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function craftsman()
  {
    return $this->belongsTo(User::class, "user_id");
  }
}
