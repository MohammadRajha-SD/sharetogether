<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Image;
class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        $images = [
            'https://picsum.photos/seed/pic1/800/600',
            'https://picsum.photos/seed/pic2/800/600',
            'https://picsum.photos/seed/pic3/800/600',
            'https://picsum.photos/seed/pic4/800/600'
        ];

        foreach ($posts as $post) {
            foreach ($images as $imagePath) {
                Image::create([
                    'path' => $imagePath,
                    'imageable_id' => $post->id,
                    'imageable_type' => Post::class
                ]);
            }
        }
    }
}
