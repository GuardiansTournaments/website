<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tournament_id',
        'team_member_id',
    ];

    function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    function teamMember()
    {
        return $this->belongsTo(TeamMember::class)->first();
    }

    function team()
    {
        return self::teamMember()->team();
    }

    function user()
    {
        return self::teamMember()->user();
    }
}
