<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
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
        'avatar',
        'banner',
    ];

    public function teams()
    {
        return $this->hasMany(Team::class)->get();
    }

    public function members()
    {
        return $this->hasMany(OrganizationMember::class)->get();
    }

    public function games()
    {
        return collect(self::teams())->map(function (Team $team) {
            return $team->game();
        })->unique('id');
    }
}
