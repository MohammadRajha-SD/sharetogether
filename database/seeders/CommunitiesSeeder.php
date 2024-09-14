<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommunitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('communities')->truncate();
          // Insert data with slug
          DB::table('communities')->insert([
            [
                'name' => 'Short-term street friends, unemployed or other accidental loss of housing',
                'slug' => Str::slug('Short-term street friends, unemployed or other accidental loss of housing'),
            ],
            [
                'name' => 'Long-term street dwellers forming settlements',
                'slug' => Str::slug('Long-term street dwellers forming settlements'),
            ],
            [
                'name' => 'Need help get rid off drug addiction or mental trauma',
                'slug' => Str::slug('Need help get rid off drug addiction or mental trauma'),
            ],
        ]);
    }
}
