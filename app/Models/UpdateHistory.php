<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateHistory extends Model
{
  use HasFactory;
  protected $guarded = ['id'];
  public function adminId()
  {
    return $this->belongsTo(User::class, "admin_id");
  }
  public function userId()
  {
    return $this->belongsTo(User::class, "user_id");
  }
}
