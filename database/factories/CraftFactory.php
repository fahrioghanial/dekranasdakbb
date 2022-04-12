<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Craft>
 */
class CraftFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'title' => $this->faker->sentence(mt_rand(1, 4)),
      'slug' => $this->faker->slug(),
      'category_id' => 1,
      'user_id' => 1,
      'price' => 'Rp245.000',
      'size' => 'normal',
      'color' => 'yellow',
      'motive' => 'batik'
    ];
  }
}
