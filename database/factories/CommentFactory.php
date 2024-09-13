<?php

namespace Database\Factories;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraph,
            'post_id' => Post::factory(),
            'user_id' => User::factory(),
            'parent_id' => null, // Default to null for root comments
        ];
    }
}
