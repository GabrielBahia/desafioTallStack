<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;
use App\Models\Championship;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'nationality', 
        'score',
        'wins', 
        'losses',
    ];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function championships()
    {
        return $this->belongsToMany(Championship::class);
    }


}

