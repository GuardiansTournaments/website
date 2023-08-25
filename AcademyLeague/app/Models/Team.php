<?php

namespace App\Models;

use App\Enums\TeamMemberRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    // function tournaments()
    // {
    //     return $this->hasMany(Tournament::class);
    // }

    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class)->get();
    }


    public function invite()
    {
        return $this->hasOne(TeamInvite::class)->first();
    }

    public function game()
    {
        return $this->hasOne(Game::class)->first();
    }
}
