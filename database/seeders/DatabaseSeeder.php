<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Championship;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $this->call(TeamSeeder::class);
        }

        for ($i = 0; $i < 10; $i++) {
            $this->call(PlayerSeeder::class);
        }

        for ($i = 0; $i < 3; $i++) {
            $this->call(ChampionshipSeeder::class);
        }

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@user',
        ]);
    }
}
