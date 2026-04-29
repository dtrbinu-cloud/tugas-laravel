<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'image_path' => 'posts/demo-' . fake()->uuid() . '.jpg',
            'image_original_name' => fake()->word() . '.jpg',
            'caption' => fake()->sentence(),
            'is_published' => true,
        ];
    }
}
