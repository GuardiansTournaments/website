<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;

class TournamentSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tournament_settings')->insert([[
            'team_size' => 2,
            'team_amount' => 4,
            'start' => Carbon::now()->addDay(7),
            'banner' => '/images/seed/tournament/rocketleague.jpg',
            'tournament_id' => 1
        ],[
            'team_size' => 2,
            'team_amount' => 20,
            'start' => Carbon::now()->addDay(8),
            'banner' => '/images/seed/tournament/valorant.png',
            'tournament_id' => 2
        ],[
            'team_size' => 2,
            'team_amount' => 30,
            'start' => Carbon::now()->addDay(4),
            'banner' => '/images/seed/tournament/csgo.jpg',
            'tournament_id' => 3
        ],[
            'team_size' => 3,
            'team_amount' => 12,
            'start' => Carbon::now()->addDay(3),
            'banner' => '/images/seed/tournament/leagueoflegends.webp',
            'tournament_id' => 4
        ],]);
    }
}
