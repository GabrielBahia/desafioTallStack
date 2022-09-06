<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'age', 
        'nationality', 
        'wins', 
        'losses',
    ];
    
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

}
