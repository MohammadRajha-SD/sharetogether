<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
//CategoriesTableSeeder
        $this->call([
            UsersTableSeeder::class,
            CountriesTableSeeder::class,
            OccupationsTableSeeder::class,
            CategoriesTableSeeder::class,
//            CategorySeeder::class,
//            UserDetailsTableSeeder::class,
//            UserInterestsTableSeeder::class,
//            PostsTableSeeder::class,
//            ImagesTableSeeder::class,
//            CommentsTableSeeder::class,
        ]);
    }
}
