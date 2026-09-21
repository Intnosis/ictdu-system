<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    protected $filable = [
        'title',
        'description',
        'date',
        'location',
        'type'
    ];
}
