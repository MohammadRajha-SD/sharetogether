<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('communities')->insert([
            ['name' => 'Short-term street friends, unemployed or other accidental loss of housing'],
            ['name' => 'Long-term street dwellers forming settlements'],
            ['name' => 'Need help get rid off drug addiction or mental trauma'],
        ]);
    }
}
