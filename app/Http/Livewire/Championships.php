<?php

namespace App\Http\Livewire;
use App\Models\Championship;
use App\Models\Player;
use App\Models\Team;
use Livewire\WithPagination;
use Livewire\Component;

class Championships extends Component
{
    use WithPagination;

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

    public function viewChampionship(Championship $championship) 
    {
        $this->name = $championship->name;
        $this->game = $championship->game;
        $this->start_date = $championship->start_date;
        $this->finish_date = $championship->finish_date;
        $this->campeonato = $championship;

        $this->showView = false;
    }

    public function edit(Championship $championship) 
    {
        $this->name = $championship->name;
        $this->game = $championship->game;
        $this->start_date = $championship->start_date;
        $this->finish_date = $championship->finish_date;
        $this->teamsChampionship = $championship->players;
        $this->id_championship = $championship->id;
    }

    public function updateChampionship()
    {
        $this->validate();

        $championship = Championship::where('id', $this->id_championship)->first();
        $championship->update([
            'name' => $this->name,
            'game' => $this->game,
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
        ]);

        $oldTeams = $championship->teams;
        $championship->teams()->detach($oldTeams);
        $championship->teams()->sync($this->teamsChampionship);

        $this->showEdit = false;
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
        $championships =  Championship::paginate(6);
        return view('livewire.championships.championships-index', [
            'teams' => Team::all(),
            'players' => Player::all(),
            'championships' => $championships,
        ]);
    }
}
