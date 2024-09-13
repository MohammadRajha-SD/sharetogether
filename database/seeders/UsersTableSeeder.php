<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User',
            'username' => 'user',
            'phone' => '1234567890',
            'email' => 'user@gmail.com',
            'is_admin' => 0,
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'phone' => '0987654321',
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
