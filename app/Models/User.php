<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, Sluggable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $guarded = ['id'];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function crafts()
  {
    return $this->hasMany(Craft::class);
  }

  public function territory()
  {
    return $this->belongsTo(Territory::class, "territory_id");
  }

  public function contact()
  {
    return $this->hasOne(Contact::class, "contact_id");
  }

  // public function updatedBy()
  // {
  //   return $this->belongsTo(User::class, "updated_by");
  // }

  public function sluggable(): array
  {
    return [
      'username' => [
        'source' => 'name'
      ]
    ];
  }
}
