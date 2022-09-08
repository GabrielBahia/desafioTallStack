<?php

namespace App\Http\Livewire;

use App\Models\Player;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Players extends Component
{
    use WithFileUploads;

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
        dd("chegou");

        $this->validate();

        Player::create([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'team_id' => $this->team_id
        ]);
        
        $this->reset();
    }

    public function showPlayer()
    {

    }

    public function updatePlayer()
    {

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
