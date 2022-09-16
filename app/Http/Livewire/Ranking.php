<?php

namespace App\Http\Livewire;
use App\Models\Championship;
use App\Models\Player;
use App\Models\Team;

use Livewire\Component;

class Ranking extends Component
{

    public $searchTermTime;
    public $ordernar = NULL;

    public function ordernarPor($ordernar)
    {
        $this->ordernar = $ordernar;
    }

    public function render()
    {
        if(isset($this->ordernar))
        {
            $teams = Team::OrderBy($this->ordernar,'desc')->get();
        } else {
            $teams = Team::all();  
        }

        return view('livewire.ranking.ranking-index',[
            'teams' => $teams,
        ]);
    }

}
