<?php

namespace Database\Seeders;

use App\Models\Championship;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChampionshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $championship = Championship::factory(1)->create();
        $team = Team::inRandomOrder()->limit(10)->get();
        $teamsChampionship = [];
        for($i = 0; $i < 10; $i++) {
            $teamsChampionship[] = $team[$i]->id;
        }

        $championship[0]->teams()->sync($teamsChampionship);
        $championship[0]->save();
    }
}
