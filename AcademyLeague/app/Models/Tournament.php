<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tournament extends Model
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
        'game_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->first();
    }

    public function participants()
    {
        return $this->hasMany(Participant::class)->get();
    }

    public function game()
    {
        return $this->belongsTo(Game::class)->first();
    }

    public function teams()
    {
        return collect(self::participants())->map(function (Participant $participant) {
            return $participant->teamMember()->team();
        })->unique('id');
    }

    public function settings()
    {
        return $this->hasOne(TournamentSettings::class)->first();
    }

    public function startIsoFormat()
    {
        return Carbon::parse(self::settings()->start)->isoFormat('ddd. MMMM D, H:mm');
    }

    public function timeToGo(int $option)
    {
        $startdate = Carbon::parse(self::settings()->start);
        $now = Carbon::now();
        $days = $startdate->diffInDays($now);
        $hours = $startdate->subDays($days)->diffInHours($now);
        switch ($option) {
            case 1:
                return $days;

            case 2:
                return $hours;

            case 3:
                return $startdate->subDays($days)->subHours($hours)->DiffInMinutes();
            default:
                return $startdate;
        }
    }

    /**
     * Number of matches needed to find a winner
     */
    public function numOfMatches()
    {
        return self::settings()->team_amount - 1;
    }

    /**
     * Number of byes, when teamcount is not even.
     */
    public function numOfByes()
    {
        return (self::teams()->count() % 2);
    }

    /**
     * Number of rounds (semi-final, final etc.)
     */
    public function numOfRounds()
    {
        $teams = self::teams()->count();
        return $teams ? round(log($teams, 2)) : 0;
    }
}
