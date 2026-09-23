<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
       'tile',
       'content'
    ];

    protected $hidden = [
      'timetamps'
    ];
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
