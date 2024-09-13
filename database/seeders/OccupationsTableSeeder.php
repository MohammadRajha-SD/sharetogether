<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccupationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $occupations = [
            ['name' => 'Software Developer'],
            ['name' => 'Data Scientist'],
            ['name' => 'Project Manager'],
            ['name' => 'Graphic Designer'],
            ['name' => 'Marketing Specialist'],
        ];

        DB::table('occupations')->insert($occupations);
    }
}
