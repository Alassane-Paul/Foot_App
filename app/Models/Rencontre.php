<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rencontre extends Model
{
    protected $fillable = [
        'home_team_id',
        'away_team_id',
        'home_team_score',
        'away_team_score',
        'stade_id',
        'buteurs',
        'jour',
        'heure',
    ];

    public function home_team()
    {
        return $this->belongsTo(Equipe::class, 'home_team_id');
    }

    public function away_team()
    {
        return $this->belongsTo(Equipe::class, 'away_team_id');
    }

    public function stade()
    {
        return $this->belongsTo(Stade::class, 'stade_id');
    }
}
