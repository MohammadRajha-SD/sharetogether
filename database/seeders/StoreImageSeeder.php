<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Image;

class StoreImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logos = [
            'uploads/logo1.png',
            'uploads/logo2.png',
            'uploads/logo3.png',
        ];

        $stores = Store::all();
        foreach ($stores as $index => $store) {
            $randomLogo = $logos[array_rand($logos)];

            Image::create([
                'path' => $randomLogo,
                'imageable_id' => $store->id,
                'imageable_type' => Store::class,
            ]);
        }
    }
}
