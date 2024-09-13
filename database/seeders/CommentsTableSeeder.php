<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $posts = Post::all();

        // Create comments for each post
        foreach ($posts as $post) {
            // Create a few root comments
            Comment::factory()->count(3)->create([
                'post_id' => $post->id,
                'user_id' => $users->random()->id,
            ])->each(function ($comment) use ($users) {
                // Create a few replies for each root comment
                Comment::factory()->count(2)->create([
                    'post_id' => $comment->post_id,
                    'user_id' => $users->random()->id,
                    'parent_id' => $comment->id,
                ])->each(function ($reply) use ($users) {
                    // Optionally create more nested replies
                    Comment::factory()->count(2)->create([
                        'post_id' => $reply->post_id,
                        'user_id' => $users->random()->id,
                        'parent_id' => $reply->id,
                    ]);
                });
            });
        }//
    }
}
