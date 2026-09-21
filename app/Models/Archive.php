<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'name',
        'category',
        'file_path',
        'uploaded_by'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
