<?php

namespace App\Http\Livewire;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Players extends Component
{
    use WithFileUploads;

    public $id_player;
    public $name;
    public $age;
    public $nationality;
    public $wins;
    public $losses;
    public $team_id;
    public $player;

    protected $rules = [
        'name' => 'string|required|min:3',
        'age' => 'numeric|required',
        'nationality' => 'string|required',
        'team_id' => 'required'
    ];


    public function storePlayer()
    {
        $this->validate();

        Player::create([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'team_id' => $this->team_id
        ]);
        
        $this->reset();
    }

    public function edit(Player $player)
    {
        $this->id_player = $player->id;
        $this->name = $player->name;
        $this->age = $player->age;
        $this->nationality = $player->nationality;
        $this->wins = $player->wins;
        $this->losses = $player->losses;
        $this->team = Team::where('id', $player->team_id)->first();
        $this->player = $player;
    }
    

    public function showPlayer()
    {

    }

    public function updatePlayer()
    {
        dd("chegou");
    }

    public function deletePlayer($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.players-index', [
            'players' => Player::all()
        ]);
    }
}
