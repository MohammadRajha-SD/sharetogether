<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\Community;
use App\Models\User;
use Carbon\Carbon;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $communities = Community::all();

        foreach ($communities as $community) {
            for ($i = 0; $i < 50; $i++) {
                Message::create([
                    'community_id' => $community->id,
                    'user_id' => User::inRandomOrder()->first()->id,
                    'message' => 'Sample message ' . $i,
                    'created_at' => Carbon::now()->subDays(rand(0, 10)), 
                    'updated_at' => Carbon::now(),
                ]);
            }
        }   
    }
}
