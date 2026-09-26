<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Team_Members extends Model
{
    protected $fillable = [
        'positions',
        'team_id',
        'user_id'
    ];

    protected $hidden = [
        'timestamps'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
