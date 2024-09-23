<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\RealEstatePost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagesTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = RealEstatePost::all();

        $images = [
            'uploads/real1.png',
            'uploads/real2.png',
            'uploads/real3.png',
            // 'uploads/real4.png',
            // 'uploads/real5.png',
        ];

        foreach ($posts as $post) {
            foreach ($images as $imagePath) {
                Image::create([
                    'path' => $imagePath,
                    'imageable_id' => $post->id,
                    'imageable_type' => RealEstatePost::class
                ]);
            }
        }
    }
}
