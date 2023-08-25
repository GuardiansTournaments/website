<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_members')->insert([[
            'user_id' => 1,
            'team_id' => 1,
            'role' => 1,
            'status' => 1,
        ],[
            'user_id' => 2,
            'team_id' => 2,
            'role' => 1,
            'status' => 1,
        ],[
            'user_id' => 3,
            'team_id' => 3,
            'role' => 1,
            'status' => 1,
        ]]);
    }
}
