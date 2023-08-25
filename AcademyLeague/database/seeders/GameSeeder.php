<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([[
            'name' => 'Rocket League',
            'description' => 'Rocket League is a video game the combines arcade-style soccer and driving games. You play by controlling rocket-powered vehicles, which you can use to score goals with a giant soccer ball. Gameplay is energetic and chaotic as the cars can flip and fly in all directions.',
            'avatar' => '/images/seed/game/rocketleague.jpg'
        ],[
            'name' => 'Valorant',
            'description' => 'Valorant is a team-based first-person tactical hero shooter set in the near future. Players play as one of a set of Agents, characters based on several countries and cultures around the world. In the main game mode, players are assigned to either the attacking or defending team with each team having five players on it.',
            'avatar' => '/images/seed/game/valorant.jpg'
        ],[
            'name' => 'Counter Strike',
            'description' => 'Counter-Strike is an objective-based, multiplayer tactical first-person shooter. Two opposing teams—the Terrorists and the Counter Terrorists—compete in game modes to complete objectives, such as securing a location to plant or defuse a bomb and rescuing or guarding hostages.',
            'avatar' => '/images/seed/game/csgo.jpeg'
        ],[
            'name' => 'League of Legends',
            'description' => 'League of Legends is one of the world\'s most popular video games, developed by Riot Games. It features a team-based competitive game mode based on strategy and outplaying opponents. Players work with their team to break the enemy Nexus before the enemy team breaks theirs.',
            'avatar' => '/images/seed/game/lol.png'
            ]]);
    }
}
