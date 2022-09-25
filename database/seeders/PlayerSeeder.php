<?php

namespace Database\Seeders;

use App\Http\Livewire\Players;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $player = Player::factory(1)->create();
        $team = Team::inRandomOrder()->limit(1)->get();

        $player[0]->team_id = $team[0]->id;
        $player[0]->save();
    }
}
