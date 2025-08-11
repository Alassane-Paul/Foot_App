<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'creation_year',
        'coach',
        'stade',
        'players',
        'description',
    ];

    /**
     * Get the players for the team.
     */
    public function players()
    {
        return $this->hasMany(Joueur::class);
    }

    /**
     * Get the coach for the team.
     */
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
    /**
     * Get the matches played by the team.
     */
    public function matches()
    {
        return $this->hasMany(Rencontre::class, 'home_team_id')
            ->orWhere('away_team_id', $this->id);
    }
}
