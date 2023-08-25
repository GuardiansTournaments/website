<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamInvite extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'team_id',
        'expiration',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class)->first();
    }

    public function isExpired()
    {
        $expirationDatetime = Carbon::parse($this->attributes['expiration']); 
        return $expirationDatetime->isPast();
    }
}
