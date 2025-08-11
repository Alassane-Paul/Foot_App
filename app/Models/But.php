<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class But extends Model
{
    protected $fillable = [
        'joueur_id',
        'equipe_id',
        'rencontre_id',
        'minute',
        'nombre_buts',
        'type',
    ];

    public function joueur()
    {
        return $this->belongsTo(Joueur::class);
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    public function rencontre()
    {
        return $this->belongsTo(Rencontre::class);
    }
}
