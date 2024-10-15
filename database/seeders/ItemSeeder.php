<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itemTypes = ['Pizza', 'Fast Food', 'Drinks', 'Chinese', 'Coffee'];
        $stores = Store::all();

        foreach ($stores as $store) {
            for ($i = 1; $i <= 10; $i++) {
                $randomType = $itemTypes[array_rand($itemTypes)];

                Item::create([
                    'store_id' => $store->id,
                    'name' => $randomType,
                    'description' => "Delicious {$randomType} available at Store {$store->id}.", 
                    'price' => rand(10, 100) + rand(0, 99) / 100, 
                ]);
            }
        }
    }
}
