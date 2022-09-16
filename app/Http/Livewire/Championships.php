<?php

namespace App\Http\Livewire;
use App\Models\Championship;
use App\Models\Player;
use App\Models\Team;

use Livewire\Component;

class Championships extends Component
{
    public $name;
    public $game;
    public $start_date;
    public $finish_date;
    public $teamsChampionship = [];
    public $showCreate = false;
    public $showEdit = false;
    public $showView = false;

    protected $rules = [
        'name' => 'string|required',
        'game' => 'string|required',
        'start_date' => 'date|required',
        'finish_date' => 'date|required',

    ];

    public function storeChampionship()
    {
        $this->validate();
        
        $championship = Championship::create([
            'name' => $this->name,
            'game' => $this->game,
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
        ]);

        $championship->teams()->sync($this->teamsChampionship);
        
        $this->showCreate = false;
        $this->reset();
    }

    public function deleteChampionship($id)
    {
        $championship = Championship::findOrFail($id);
        $championship->delete();
        $this->reset();
    }


    public function render()
    {
        return view('livewire.championships.championships-index', [
            'teams' => Team::all(),
            'players' => Player::all(),
            'championships' => Championship::all(),
        ]);
    }
}
