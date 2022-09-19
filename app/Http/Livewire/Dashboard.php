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
    public $ordernar;
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
        $this->id_championship = $championship->id;

        $this->showView = false;
    }

    public function filtro($ordernar)
    {
        $this->ordernar = $ordernar;
    }

    public function render()
    {
        $timesId = [];
        $times = Team::all();
        if(isset($this->id_championship)) {
            $campeonato =  Championship::where('id', 'like', $this->id_championship)->first();
            $times = $campeonato->teams;
            foreach($times as $time) {
                $timesId[] = $time->id;
            }

            if(isset($this->ordernar)) {
                $times = Team::whereIn('id', $timesId)
                    ->orderBy('score', 'desc')->get();
            }
            
    
        }

        return view('livewire.dashboard.dashboard-index', [
            'championships' => Championship::all(),
            'teams' => $times,
        ]);
    }
}
