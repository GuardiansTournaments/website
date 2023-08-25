<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tournaments')->insert([[
            'name' => 'Summer blitz rocket league',
            'description' => 'this is a tournament description',
            'user_id' => 1,
            'game_id' => 1,
        ],[
            'name' => 'Summer Valorant',
            'description' => 'this is a tournament description',
            'user_id' => 2,
            'game_id' => 2,
        ],[
            'name' => 'Summer Counter strike',
            'description' => 'this is a tournament description',
            'user_id' => 2,
            'game_id' => 3,
        ],[
            'name' => 'Summer League of legends',
            'description' => 'this is a tournament description',
            'user_id' => 3,
            'game_id' => 4,
        ]]);
    }
}
