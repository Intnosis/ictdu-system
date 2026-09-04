<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    protected $fillable = [
    'title'
    'description'
    'deadline'
    'user_id'
    ];
    
    public function user ()
    {
        return $this->belongsTo(User::Class);
}
