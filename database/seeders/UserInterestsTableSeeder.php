<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\UserInterest;

class UserInterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        foreach ($users as $user) {
            // Assign a random number of categories to each user
            $userCategories = $categories->random(rand(1, 3));

            foreach ($userCategories as $category) {
                UserInterest::create([
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
