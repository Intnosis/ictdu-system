<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'team_name',
        'deacription'
    ];

    public function team_members()
    {
        return $this->hasMany(Team_Members::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
