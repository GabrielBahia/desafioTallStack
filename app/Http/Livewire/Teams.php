<?php

namespace App\Http\Livewire;

use App\Models\Championship;
use App\Models\Player;
use App\Models\Team;
use Livewire\Component;

class Teams extends Component
{
    public $id_team;
    public $name;
    public $nationality;
    public $score;
    public $wins;
    public $losses;
    public $playersTeam = [];
    public $championshipsTeam = [];
    public $showCreate = false;
    public $showEdit = false;
    

    protected $rules = [
        'name' => 'string|required|min:3',
        'nationality' => 'string|required',
        'wins' => 'numeric|required',
        'losses' => 'numeric|required',
    ];


    public function storeTeam()
    {
        $this->validate();

        $this->score = $this->wins - $this->losses;

        $this->validate();

        $team = Team::create([
            'name' => $this->name,
            'nationality' => $this->nationality,
            'score' => $this->score,
            'wins' => $this->wins,
            'losses' => $this->losses,
        ]);

        Player::whereIn('id', $this->playersTeam)->update([
            'id_team' => $team->id,
        ]);

        $this->showCreate = false;
        $this->reset();
    }

    public function viewTeam(Team $team) 
    {
        $this->id_team = $team->id;
        $this->name = $team->name;
        $this->nationality = $team->nationality;
        $this->score = $team->score;
        $this->wins = $team->wins;
        $this->losses = $team->losses;
        $this->playersTeam = $team->players;
    }

    public function edit(Team $team)
    {
        $this->id_team = $team->id;
        $this->name = $team->name;
        $this->nationality = $team->nationality;
        $this->score = $team->score;
        $this->wins = $team->wins;
        $this->losses = $team->losses;
    }
    
    
    public function updateTeam()
    {
        $this->validate();

        $Team = Team::where('id', $this->id_team)->update([
            'name' => $this->name,
            'nationality' => $this->nationality,
            'score' => $this->score,
            'wins' => $this->wins,
            'losses' => $this->losses,
        ]);

        $this->showEdit = false;
        $this->reset();
    }

    public function deleteTeam($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.teams.teams-index', [
            'teams' => Team::all(),
            'championships' => Championship::all(),
            'players' => Player::all(),
            'playersTeam' => $this->playersTeam,
            'championshipsTeam' => $this->championshipsTeam
        ]);
    }
}
