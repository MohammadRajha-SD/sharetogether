<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $categories = Category::all();

        foreach ($users as $user) {
            foreach ($categories as $category) {
                Post::create([
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'title' => 'Sample Post in ' . $category->name,
                    'slug' => Str::slug('Sample Post in ' . $category->name . ' by ' . $user->name . ' ' . Str::random(5)),
                    'description' => 'This is a sample post in the category ' . $category->name . ' by user ' . $user->name,
                    'status' => 1,
                ]);
            }
        }
    }
}
