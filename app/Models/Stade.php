<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stade extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Get the matches played at this stadium.
     */
    public function matches()
    {
        return $this->hasMany(Rencontre::class, 'stade_id');
    }
}
