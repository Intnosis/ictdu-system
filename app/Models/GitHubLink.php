<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GitHubLink extends Model
{
    protected $fillable = [ 'project_name', 'repo_link', 'description', 'tech_stack', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
