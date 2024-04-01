<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $post_ids = Post::pluck('id');
        $user_ids = User::pluck('id');
        return [
            'post_id' => fake()->randomElement($post_ids),
            'user_id' => fake()->randomElement($user_ids),
            'body' => fake()->paragraph(),
        ];
    }
}
