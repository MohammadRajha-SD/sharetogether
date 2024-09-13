<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = config('categories')['categories'];
        $this->seedCategories($categories);
    }

    private function seedCategories(array $categories, $parentId = null)
        {
            foreach ($categories as $category) {
                $newCategory = [
                    'name' => $category['name'],
                    'slug' => $category['slug'],
                    'parent_id' => $parentId,
                    'icon' => $category['icon'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                // Insert the category and get the inserted ID
                $categoryId = DB::table('categories')->insertGetId($newCategory);

                // Check for subcategories
                if (isset($category['subcategories']) && !empty($category['subcategories'])) {
                    // Recursive call for subcategories
                    $this->seedCategories($category['subcategories'], $categoryId);
                }
            }
        }
}
