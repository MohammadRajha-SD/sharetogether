<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $countries = [
            ['name' => 'United States', 'code' => 'USA'],
            // ['name' => 'Canada', 'code' => 'CAN'],
            // ['name' => 'United Kingdom', 'code' => 'GBR'],
            // ['name' => 'Australia', 'code' => 'AUS'],
            // ['name' => 'Germany', 'code' => 'DEU'],
        ];
        DB::table('countries')->truncate();
        DB::table('countries')->insert($countries);
    }
}
