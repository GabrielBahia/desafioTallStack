<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Championship extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'game', 
        'start-date', 
        'finish-date', 
    ];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
