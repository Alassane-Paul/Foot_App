<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    protected $fillable = [
        'name',
        'profil',
        'post',
        'equipe_id',
        'dorsard_number',
    ];

    
}
