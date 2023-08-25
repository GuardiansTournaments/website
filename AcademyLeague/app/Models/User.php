<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\UserRoleEnum;
use App\Enums\TeamMemberRoleEnum;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'nickname',
        'avatar',
        'email',
        'role',
        'birth',
        'has_discord',
        'platform',
        'locale',
        'banner_color',
        'accent_color',
        'banner',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => UserRoleEnum::class
    ];

    public function tournaments()
    {
        return $this->hasMany(Tournament::class)->get();
    }

    public function teamMember()
    {
        return $this->hasOne(TeamMember::class)->first();
    }

    public function hasDiscord()
    {
        return $this->attributes['has_discord'];
    }

    public function isTeamLeader(int $teamId)
    {
        return TeamMember::whereUserIdAndTeamIdAndRole($this->attributes['id'],$teamId, TeamMemberRoleEnum::Captain)->first();
    }
}
