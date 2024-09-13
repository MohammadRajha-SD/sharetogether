<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use App\Models\Category;
use App\Models\ChildCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Exchange Market' => [
                'icon' => 'fa-exchange-alt',
                'children' => [
                    'General' => ['Skills', 'Items'],
                    'Free' => [],
                    'Arts+Crafts' => ['Arts', 'Crafts'],
                    'Clothes' => ['Men', 'Women', 'Kid', 'Baby'],
                    'Shoes' => ['Men', 'Women', 'Kid', 'Baby'],
                    'Hats' => ['Men', 'Women', 'Kid', 'Baby'],
                    'Jewelry' => ['Men', 'Women', 'Kid', 'Baby'],
                    'Books' => [],
                    'Outside' => [],
                    'Appliances' => [],
                    'Antiques' => [],
                    'CDs+DVDs+VHS' => [],
                    'Cell Phone' => [],
                    'Clothes+Acc' => [],
                    'Collectibles' => [],
                    'Computer' => [],
                    'Electronics' => [],
                    'Farm+Garden' => [],
                    'Furniture' => [],
                    'Heavy Equip' => [],
                    'Household' => [],
                    'Materials' => [],
                    'Instrument' => [],
                    'Photo+Video' => [],
                    'Sporting' => [],
                    'Tickets' => [],
                    'Tools' => [],
                    'Toys+Games' => [],
                ],
            ],
        ];

        foreach ($categories as $parentName => $data) {
            $parentCategory = Category::create([
                'name' => $parentName,
                'slug' => Str::slug($parentName),
                'icon' => $data['icon']
            ]);

            foreach ($data['children'] as $childName => $childCategories) {
                // If $childName is actually a subcategory name
                $subCategory = SubCategory::create([
                    'name' => $childName,
                    'slug' => Str::slug($childName),
                    'category_id' => $parentCategory->id,
                ]);

                // Create child categories for specific subcategories
                foreach ($childCategories as $childCategoryName) {
                    ChildCategory::create([
                        'name' => $childCategoryName,
                        'slug' => Str::slug($childCategoryName),
                        'category_id' => $parentCategory->id,
                        'sub_category_id' => $subCategory->id,
                    ]);
                }
            }
        }
    }
}
