<?php

namespace App\Http\Livewire;
use App\Models\Championship;
use App\Models\Player;
use App\Models\Team;

use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        return view('livewire.dashboard.dashboard-index', [
            'championships' => Championship::all(),
        ]);
    }
}
