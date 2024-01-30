<?php

namespace Database\Seeders;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach($users as $user){
            $randUsers=$users->random(rand(0,$users->count()));
            foreach($randUsers as $randUser){
                if($randUser === $user){
                    continue;
                }
                Follower::factory()->create(['follower_id' => $randUser->id, 'followee_id' => $user->id]);
            }
    }
    }
}