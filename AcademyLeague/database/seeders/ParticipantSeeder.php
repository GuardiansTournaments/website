<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participants')->insert([[
            'team_member_id' => 1,
            'tournament_id' => 1,
        ],[
            'team_member_id' => 2,
            'tournament_id' => 1,
        ],[
            'team_member_id' => 3,
            'tournament_id' => 1,
        ]]);
    }
}
