<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    public function run(): void
    {

        $states = [
            ['id' => 1, 'name' => 'Alabama', 'country_id' => 1],
            ['id' => 2, 'country_id' => 1, 'name' => 'Alaska'],
            ['id' => 3, 'country_id' => 1, 'name' => 'Arizona'],
            ['id' => 4, 'country_id' => 1, 'name' => 'Arkansas'],
            ['id' => 5, 'country_id' => 1, 'name' => 'California'],
            ['id' => 6, 'country_id' => 1, 'name' => 'Colorado'],
            ['id' => 7, 'country_id' => 1, 'name' => 'Connecticut'],
            ['id' => 8, 'country_id' => 1, 'name' => 'Delaware'],
            ['id' => 9, 'country_id' => 1, 'name' => 'District of Columbia'],
            ['id' => 10, 'country_id' => 1, 'name' => 'Florida'],
            ['id' => 11, 'country_id' => 1, 'name' => 'Georgia'],
            ['id' => 12, 'country_id' => 1, 'name' => 'Hawaii'],
            ['id' => 13, 'country_id' => 1, 'name' => 'Idaho'],
            ['id' => 14, 'country_id' => 1, 'name' => 'Illinois'],
            ['id' => 15, 'country_id' => 1, 'name' => 'Indiana'],
            ['id' => 16, 'country_id' => 1, 'name' => 'Iowa'],
            ['id' => 17, 'country_id' => 1, 'name' => 'Kansas'],
            ['id' => 18, 'country_id' => 1, 'name' => 'Kentucky'],
            ['id' => 19, 'country_id' => 1, 'name' => 'Louisiana'],
            ['id' => 20, 'country_id' => 1, 'name' => 'Maine'],
            ['id' => 21, 'country_id' => 1, 'name' => 'Maryland'],
            ['id' => 22, 'country_id' => 1, 'name' => 'Massachusetts'],
            ['id' => 23, 'country_id' => 1, 'name' => 'Michigan'],
            ['id' => 24, 'country_id' => 1, 'name' => 'Minnesota'],
            ['id' => 25, 'country_id' => 1, 'name' => 'Mississippi'],
            ['id' => 26, 'country_id' => 1, 'name' => 'Missouri'],
            ['id' => 27, 'country_id' => 1, 'name' => 'Montana'],
            ['id' => 28, 'country_id' => 1, 'name' => 'Nebraska'],
            ['id' => 29, 'country_id' => 1, 'name' => 'Nevada'],
            ['id' => 30, 'country_id' => 1, 'name' => 'New Hampshire'],
            ['id' => 31, 'country_id' => 1, 'name' => 'New Jersey'],
            ['id' => 32, 'country_id' => 1, 'name' => 'New Mexico'],
            ['id' => 33, 'country_id' => 1, 'name' => 'New York'],
            ['id' => 34, 'country_id' => 1, 'name' => 'North Carolina'],
            ['id' => 35, 'country_id' => 1, 'name' => 'North Dakota'],
            ['id' => 36, 'country_id' => 1, 'name' => 'Ohio'],
            ['id' => 37, 'country_id' => 1, 'name' => 'Oklahoma'],
            ['id' => 38, 'country_id' => 1, 'name' => 'Oregon'],
            ['id' => 39, 'country_id' => 1, 'name' => 'Pennsylvania'],
            ['id' => 40, 'country_id' => 1, 'name' => 'Rhode Island'],
            ['id' => 41, 'country_id' => 1, 'name' => 'South Carolina'],
            ['id' => 42, 'country_id' => 1, 'name' => 'South Dakota'],
            ['id' => 43, 'country_id' => 1, 'name' => 'Tennessee'],
            ['id' => 44, 'country_id' => 1, 'name' => 'Texas'],
            ['id' => 45, 'country_id' => 1, 'name' => 'Utah'],
            ['id' => 46, 'country_id' => 1, 'name' => 'Vermont'],
            ['id' => 47, 'country_id' => 1, 'name' => 'Virginia'],
            ['id' => 48, 'country_id' => 1, 'name' => 'Washington'],
            ['id' => 49, 'country_id' => 1, 'name' => 'West Virginia'],
            ['id' => 50, 'country_id' => 1, 'name' => 'Wisconsin'],
            ['id' => 51, 'country_id' => 1, 'name' => 'Wyoming'],
        ];
        DB::table('states')->truncate();
        DB::table('states')->insert($states);
    }
}
