<?php

namespace App\Http\Livewire;
use App\Models\Championship;
use App\Models\Player;
use App\Models\Team;

use Livewire\Component;

class Dashboard extends Component
{   
    public $name;
    public $game;
    public $start_date;
    public $finish_date;
    public $id_championship;
    public $campeonato;
    public $teamsChampionship = [];
    public $showCreate = false;
    public $showEdit = false;
    public $showView = false;

    public function viewChampionship(Championship $championship) 
    {
        $this->name = $championship->name;
        $this->game = $championship->game;
        $this->start_date = $championship->start_date;
        $this->finish_date = $championship->finish_date;
        $this->campeonato = $championship;

        $this->showView = false;
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-index', [
            'championships' => Championship::all(),
        ]);
    }
}
