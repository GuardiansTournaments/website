<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TeammemberRoleEnum;

class TeamMember extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'status',
        'user_id',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->first();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $casts = [
        'role' => TeamMemberRoleEnum::class
    ];
}
