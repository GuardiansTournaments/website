<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([[
            'name' => 'Guardians',
            'description' => 'new winning team',
            'game_id' => 2,
        ],[
            'name' => 'Teampie',
            'description' => 'Een beschrijving',
            'game_id' => 4,
        ],[
            'name' => 'Terror',
            'description' => 'slashed',
            'game_id' => 1,
        ]]);
    }
}
