<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    

    public function team_members()
    {
        return $this->hasMany(Team_Members::class);
    }
}
