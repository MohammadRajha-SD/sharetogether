<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder_old extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Food',
                'slug' => 'food',
                'icon' => 'fa fa-utensils',
                'subcategories' => [
                    ['name' => 'Home', 'slug' => 'home'],
                    ['name' => 'Restaurant', 'slug' => 'restaurant'],
                    ['name' => 'Foodtrucks', 'slug' => 'foodtrucks'],
                    ['name' => 'Grocery store community delivery', 'slug' => 'grocery-store-community-delivery']
                ]
            ],
            [
                'name' => 'Local Service',
                'slug' => 'local-service',
                'icon' => 'fa fa-tools',
                'subcategories' => [
                    ['name' => 'Daycare', 'slug' => 'daycare'],
                    ['name' => 'Cleaning', 'slug' => 'cleaning'],
                    ['name' => 'Moving', 'slug' => 'moving'],
                    ['name' => 'Shipping', 'slug' => 'shipping'],
                    ['name' => 'Fixing', 'slug' => 'fixing'],
                    ['name' => 'Car rental', 'slug' => 'car-rental']
                ]
            ],
            [
                'name' => 'Real Estate',
                'slug' => 'real-estate',
                'icon' => 'fa fa-home',
                'subcategories' => [
                    ['name' => 'Rent', 'slug' => 'rent'],
                    ['name' => 'Sale', 'slug' => 'sale'],
                    ['name' => 'Swap', 'slug' => 'swap'],
                    ['name' => 'Flip', 'slug' => 'flip'],
                    ['name' => 'Land', 'slug' => 'land'],
                    ['name' => 'Farm', 'slug' => 'farm']
                ]
            ],
            [
                'name' => 'Recruitment',
                'slug' => 'recruitment',
                'icon' => 'fa fa-briefcase',
                'subcategories' => [
                    // Add subcategories here
                ]
            ],
            [
                'name' => 'Training',
                'slug' => 'training',
                'icon' => 'fa fa-chalkboard-teacher',
                'subcategories' => [
                    // Add subcategories here
                ]
            ],
            [
                'name' => 'Mom',
                'slug' => 'mom',
                'icon' => 'fa fa-female',
                'subcategories' => []
            ],
            [
                'name' => 'Dad',
                'slug' => 'dad',
                'icon' => 'fa fa-male',
                'subcategories' => []
            ],
            [
                'name' => 'Homeless',
                'slug' => 'homeless',
                'icon' => 'fa fa-users',
                'subcategories' => []
            ]
        ];

        foreach ($categories as $categoryData) {
            $subcategories = $categoryData['subcategories'];
            unset($categoryData['subcategories']);
            $category = Category::create($categoryData);

            foreach ($subcategories as $subcategoryData) {
                $subcategoryData['parent_id'] = $category->id;
                Category::create($subcategoryData);
            }
        }
    }
}
