<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Electronics', 'slug' => 'electronics'],
            ['name' => 'Clothing', 'slug' => 'clothing'],
            ['name' => 'Groceries', 'slug' => 'groceries'],
            ['name' => 'Books', 'slug' => 'books'],
        ]);
        
        DB::table('products')->insert([
            ['name' => 'Laptop', 'description' => 'A powerful laptop', 'price' => 1200, 'category_id' => 1, 'user_id' => 1],
            ['name' => 'T-shirt', 'description' => 'Comfortable cotton T-shirt', 'price' => 20, 'category_id' => 2, 'user_id' => 2],
            ['name' => 'Book: Laravel Basics', 'description' => 'Learn Laravel from scratch', 'price' => 15, 'category_id' => 4, 'user_id' => 1],
            ['name' => 'Smartphone', 'description' => 'Latest model smartphone', 'price' => 700, 'category_id' => 1, 'user_id' => 2],
        ]);

        DB::table('exchanges')->insert([
            ['user_id' => 1, 'product_id_offered' => 1, 'product_id_requested' => 3, 'status' => 'pending'],
            ['user_id' => 2, 'product_id_offered' => 4, 'product_id_requested' => 2, 'status' => 'accepted'],
        ]);
    }
}
