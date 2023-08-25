<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentGroupTeam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'team_id',
        'tournament_group_id',
        'order',
    ];

    public function group()
    {
        return $this->belongsTo(TournamentGroup::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
