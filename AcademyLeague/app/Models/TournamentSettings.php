<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentSettings extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'start',
        'team_size',
        'max_slots',
        'format',
        'banner',
        'tournament_id',
    ];

    function tournament()
    {
        return $this->hasOne(Tournament::class)->first();
    }
}
