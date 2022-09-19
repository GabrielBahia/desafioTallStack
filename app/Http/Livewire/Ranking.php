<?php

namespace App\Http\Livewire;
use App\Models\Championship;
use App\Models\Player;
use App\Models\Team;

use Livewire\Component;

class Ranking extends Component
{

    public $searchNationality;
    public $ordernar = NULL;

    public function filtro($ordernar)
    {
        $this->ordernar = $ordernar;
    }

    public function render()
    {
        if(isset($this->ordernar) && $this->searchNationality != ""){
            $teams = Team::where('nationality', 'like', $this->searchNationality)->OrderBy($this->ordernar,'desc')->get();
        } else if(isset($this->ordernar) && $this->searchNationality == ""){
            $teams = Team::OrderBy($this->ordernar,'desc')->get(); 
        }
        else {
            $teams = Team::all();
        }
        
        return view('livewire.ranking.ranking-index',[
            'teams' => $teams,
        ]);
    }

}
