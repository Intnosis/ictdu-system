<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    
    protected $hidden = [
        'password',
        'remeber_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function gitHubLinks()
    {
        return $this->hasMany(GitHubLink::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function dedlines()
    {
        return $this->hasMany(Deadline::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);

    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function team_members()
    {
        return $this->hasMany(Team_Members::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
