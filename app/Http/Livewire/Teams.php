<?php

namespace App\Http\Livewire;

use App\Models\Championship;
use App\Models\Player;
use App\Models\Team;
use Livewire\Component;
use PhpParser\Node\NullableType;
use Livewire\WithPagination;
class Teams extends Component
{
    use WithPagination;

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
    public $time;
    

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
            'team_id' => $team->id,
        ]);

        $team->championships()->sync($this->championshipsTeam);

        session()->flash('message', "Time $this->name foi criado com sucesso");
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
        $this->time = $team;
    }

    public function edit(Team $team)
    {
        $this->id_team = $team->id;
        $this->name = $team->name;
        $this->nationality = $team->nationality;
        $this->score = $team->score;
        $this->wins = $team->wins;
        $this->losses = $team->losses;
        $this->time = $team;
    }
    
    
    public function updateTeam()
    {
        $this->validate();
        $team = Team::where('id', $this->id_team)->first();
        $team->update([
            'name' => $this->name,
            'nationality' => $this->nationality,
            'score' => $this->score,
            'wins' => $this->wins,
            'losses' => $this->losses,
        ]);

        $oldPlayers = $team->players;
        foreach($oldPlayers as $oldPlayer) {
            $oldPlayer->team_id = NULL;
            $oldPlayer->save();
        }
        Player::whereIn('id', $this->playersTeam)->update([
            'team_id' => $team->id,
        ]);

        $oldChampionships = $team->championships;
        $team->championships()->detach($oldChampionships);
        $team->championships()->sync($this->championshipsTeam);

        session()->flash('message', "Time $this->name foi atualizado com sucesso");
        $this->showEdit = false;
        $this->reset();
    }

    public function deleteTeam($id)
    {
        $team = Team::findOrFail($id);
        session()->flash('message', "Time $team->name foi removido com sucesso");
        $team->delete();
        $this->reset();
    }

    public function render()
    {
        $teams = Team::paginate(6);
        return view('livewire.teams.teams-index', [
            'teams' => $teams,
            'championships' => Championship::all(),
            'players' => Player::all(),
            'playersTeam' => $this->playersTeam,
            'championshipsTeam' => $this->championshipsTeam
        ]);
    }
}
