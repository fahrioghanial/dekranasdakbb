<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'name' => $this->faker->name(),
      'business_name' => $this->faker->name() . ' Crafting',
      'username' => $this->faker->unique()->slug(),
      'email' => $this->faker->unique()->safeEmail(),
      'contact' => "085123456789",
      'address' => $this->faker->streetAddress(),
      'rt' => 5,
      'rw' => 20,
      'kodepos' => 40212,
      'noktp' => $this->faker->randomNumber(9, true),
      'kecamatan' => "Contoh Kecamatan",
      'kelurahan_desa' => "Contoh Kelurahan/Desa",
      'facebook' => 'facebook',
      'instagram' => 'instagram',
      'whatsapp' => '0895391719873',
      'profile_picture' => 'profile-pictures/contoh-fotoprofil.jpg',
      'password' => bcrypt('12345'),
      'remember_token' => Str::random(10),
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   *
   * @return static
   */
  public function unverified()
  {
    return $this->state(function (array $attributes) {
      return [
        'email_verified_at' => null,
      ];
    });
  }
}
