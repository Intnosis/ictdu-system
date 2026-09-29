<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'event_id',
        'team_name',
        'description'
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
