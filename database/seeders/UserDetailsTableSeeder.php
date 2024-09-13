<?php

namespace Database\Seeders;

use App\Models\Occupation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserDetail;
use App\Models\User;

class UserDetailsTableSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('username', 'user')->first();

        UserDetail::create([
            'user_id' => $user->id,
            'occupation_id' => 1,
            'country_id' => 1,
            'state' => 'California',
            'city' => 'Los Angeles',
            'longitude' => -118.2437,
            'latitude' => 34.0522,
        ]);

        $admin = User::where('username', 'admin')->first();

        UserDetail::create([
            'user_id' => $admin->id,
            'occupation_id' => 2,
            'country_id' => 1, 
            'state' => 'California',
            'city' => 'San Francisco',
            'longitude' => -122.4194,
            'latitude' => 37.7749,
        ]);
    }
}
