<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
  public $model = Post::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'content' => $this->faker->paragraphs(3, true),
            'hotness' => $this->faker->numberBetween(0, 100),
            'views_count' => 0
        ];
    }
}
