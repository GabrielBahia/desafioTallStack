<?php

namespace App\Http\Livewire;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Players extends Component
{
    use WithPagination;

    public $id_player;
    public $name;
    public $age;
    public $nationality;
    public $wins;
    public $losses;
    public $team_id;
    public $team;
    public $player;
    public $validationPlayer;
    public $showCreate = false;
    public $showEdit = false;
    public $showView = false;

    protected $rules = [
        'name' => 'string|required|min:3',
        'age' => 'numeric|required|min:1',
        'nationality' => 'string|required',
        'wins' => 'numeric|min:0',
        'losses' => 'numeric|min:0',
    ];


    public function storePlayer()
    {
        $this->validate();

        Player::create([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'wins' => $this->wins,
            'losses' => $this->losses,
            'team_id' => $this->team_id
        ]);
        
        session()->flash('message', "Jogador $this->name foi criado com sucesso");
        $this->showCreate = false;
        $this->reset();
    }

    public function viewPlayer(Player $player) 
    {
        $this->id_player = $player->id;
        $this->name = $player->name;
        $this->age = $player->age;
        $this->nationality = $player->nationality;
        $this->wins = $player->wins;
        $this->team = Team::where('id', $player->team_id)->first();

        if(!isset($this->team)) {
            $this->team = "Sem time";
        }
        else {
            $this->team = $this->team->name;
        }

        $this->losses = $player->losses;
        $this->player = $player;

        $this->showView = false;
    }

    public function edit(Player $player)
    {
        $this->id_player = $player->id;
        $this->name = $player->name;
        $this->age = $player->age;
        $this->nationality = $player->nationality;
        $this->team = Team::where('id', $player->team_id)->first();

        if(!isset($this->team)) {
            $this->team = "Sem time";
        }
        else {
            $this->team = $this->team->name;
        }

        $this->wins = $player->wins;
        $this->losses = $player->losses;
        $this->player = $player;
        $this->team_id = $player->team_id;
    }
    

    public function updatePlayer()
    {
        $this->validate();

        if($this->team_id == -1) {
            $this->team_id = NULL;
        }

        $player = Player::where('id', $this->id_player)->update([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'wins' => $this->wins,
            'losses' => $this->losses,
            'team_id' => $this->team_id
        ]);

        session()->flash('message', "Jogador $this->name foi atualizado com sucesso");
        $this->showEdit = false;
        $this->reset();
    }

    public function deletePlayer($id)
    {
        $player = Player::findOrFail($id);
        session()->flash('message', "Jogador $player->name foi removido com sucesso");
        $player->delete();
        $this->reset();
    }

    public function render()
    {
        $players = Player::paginate(6);
        return view('livewire.players.players-index', [
            'teams' => Team::all(), 
            'players' => $players
        ]);
    }
}
