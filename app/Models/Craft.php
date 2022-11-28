<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Craft extends Model
{
  use Sluggable, HasFactory;

  protected $guarded = ['id'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function craftsman()
  {
    return $this->belongsTo(User::class, "user_id");
  }

  public function updatedBy()
  {
    return $this->belongsTo(User::class, "updated_by");
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }
}
