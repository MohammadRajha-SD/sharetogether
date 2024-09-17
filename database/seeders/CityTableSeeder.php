<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    public function run(): void
    {
        $city1 = [
            ['id' => 1, 'name' => 'Abbeville', 'state_id' => 1],
            ['id' => 2, 'name' => 'Adamsville', 'state_id' => 1],
            ['id' => 3, 'name' => 'Alabaster', 'state_id' => 1],
            ['id' => 4, 'name' => 'Albertville', 'state_id' => 1],
            ['id' => 5, 'name' => 'Alexander City', 'state_id' => 1],
            ['id' => 6, 'name' => 'Alexandria', 'state_id' => 1],
            ['id' => 7, 'name' => 'Aliceville', 'state_id' => 1],
            ['id' => 8, 'name' => 'Allgood', 'state_id' => 1],
            ['id' => 9, 'name' => 'Altoona', 'state_id' => 1],
            ['id' => 10, 'name' => 'Andalusia', 'state_id' => 1],
            ['id' => 11, 'name' => 'Anniston', 'state_id' => 1],
            ['id' => 12, 'name' => 'Arab', 'state_id' => 1],
            ['id' => 13, 'name' => 'Ardmore', 'state_id' => 1],
            ['id' => 14, 'name' => 'Argo', 'state_id' => 1],
            ['id' => 15, 'name' => 'Ariton', 'state_id' => 1],
            ['id' => 16, 'name' => 'Arley', 'state_id' => 1],
            ['id' => 17, 'name' => 'Ashford', 'state_id' => 1],
            ['id' => 18, 'name' => 'Ashland', 'state_id' => 1],
            ['id' => 19, 'name' => 'Ashville', 'state_id' => 1],
            ['id' => 20, 'name' => 'Athens', 'state_id' => 1],
            ['id' => 21, 'name' => 'Atmore', 'state_id' => 1],
            ['id' => 22, 'name' => 'Attalla', 'state_id' => 1],
            ['id' => 23, 'name' => 'Auburn', 'state_id' => 1],
            ['id' => 24, 'name' => 'Autaugaville', 'state_id' => 1],
            ['id' => 25, 'name' => 'Axis', 'state_id' => 1],
            ['id' => 26, 'name' => 'Babbie', 'state_id' => 1],
            ['id' => 27, 'name' => 'Bakerhill', 'state_id' => 1],
            ['id' => 28, 'name' => 'Banks', 'state_id' => 1],
            ['id' => 29, 'name' => 'Bankston', 'state_id' => 1],
            ['id' => 30, 'name' => 'Bessemer', 'state_id' => 1],
            ['id' => 31, 'name' => 'Birmingham', 'state_id' => 1],
            ['id' => 32, 'name' => 'Black Warrior', 'state_id' => 1],
            ['id' => 33, 'name' => 'Blountsville', 'state_id' => 1],
            ['id' => 34, 'name' => 'Boaz', 'state_id' => 1],
            ['id' => 35, 'name' => 'Boligee', 'state_id' => 1],
            ['id' => 36, 'name' => 'Bon Air', 'state_id' => 1],
            ['id' => 37, 'name' => 'Bon Secour', 'state_id' => 1],
            ['id' => 38, 'name' => 'Booth', 'state_id' => 1],
            ['id' => 39, 'name' => 'Brantley', 'state_id' => 1],
            ['id' => 40, 'name' => 'Brent', 'state_id' => 1],
            ['id' => 41, 'name' => 'Brewton', 'state_id' => 1],
            ['id' => 42, 'name' => 'Bridgeport', 'state_id' => 1],
            ['id' => 43, 'name' => 'Brighton', 'state_id' => 1],
            ['id' => 44, 'name' => 'Brilliant', 'state_id' => 1],
            ['id' => 45, 'name' => 'Brookside', 'state_id' => 1],
            ['id' => 46, 'name' => 'Brookwood', 'state_id' => 1],
            ['id' => 47, 'name' => 'Brownsboro', 'state_id' => 1],
            ['id' => 48, 'name' => 'Brundidge', 'state_id' => 1],
            ['id' => 49, 'name' => 'Butler', 'state_id' => 1],
            ['id' => 50, 'name' => 'Calera', 'state_id' => 1],
            ['id' => 51, 'name' => 'Calvert', 'state_id' => 1],
            ['id' => 52, 'name' => 'Camden', 'state_id' => 1],
            ['id' => 53, 'name' => 'Camp Hill', 'state_id' => 1],
            ['id' => 54, 'name' => 'Carbon Hill', 'state_id' => 1],
            ['id' => 55, 'name' => 'Cardiff', 'state_id' => 1],
            ['id' => 56, 'name' => 'Carrollton', 'state_id' => 1],
            ['id' => 57, 'name' => 'Castleberry', 'state_id' => 1],
            ['id' => 58, 'name' => 'Catherine', 'state_id' => 1],
            ['id' => 59, 'name' => 'Cecil', 'state_id' => 1],
            ['id' => 60, 'name' => 'Center Point', 'state_id' => 1],
            ['id' => 61, 'name' => 'Centreville', 'state_id' => 1],
            ['id' => 62, 'name' => 'Chatom', 'state_id' => 1],
        ];

        $city2 = [
            ['id' => 71, 'name' => 'Anchorage', 'state_id' => 2],
            ['id' => 72, 'name' => 'Juneau', 'state_id' => 2],
            ['id' => 73, 'name' => 'Fairbanks', 'state_id' => 2],
            ['id' => 74, 'name' => 'Sitka', 'state_id' => 2],
            ['id' => 75, 'name' => 'Ketchikan', 'state_id' => 2],
            ['id' => 76, 'name' => 'Haines', 'state_id' => 2],
            ['id' => 77, 'name' => 'Skagway', 'state_id' => 2],
            ['id' => 78, 'name' => 'Homer', 'state_id' => 2],
            ['id' => 79, 'name' => 'Seward', 'state_id' => 2],
            ['id' => 710, 'name' => 'Valdez', 'state_id' => 2],
            ['id' => 711, 'name' => 'Cordova', 'state_id' => 2],
            ['id' => 712, 'name' => 'Petersburg', 'state_id' => 2],
            ['id' => 713, 'name' => 'Wrangell', 'state_id' => 2],
            ['id' => 714, 'name' => 'Kodiak', 'state_id' => 2],
            ['id' => 715, 'name' => 'Barrow', 'state_id' => 2],
            ['id' => 716, 'name' => 'Nome', 'state_id' => 2],
            ['id' => 717, 'name' => 'Bethel', 'state_id' => 2],
            ['id' => 718, 'name' => 'Dillingham', 'state_id' => 2],
            ['id' => 719, 'name' => 'Kenai', 'state_id' => 2],
            ['id' => 720, 'name' => 'Soldotna', 'state_id' => 2],
            // ... and so on
        ];
        
        DB::table('cities')->truncate();
        DB::table('cities')->insert($city1);
        DB::table('cities')->insert($city2);
    }
}
