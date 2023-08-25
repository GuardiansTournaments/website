<?php

namespace Database\Seeders;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'username' => 'admin',
            'nickname' => 'piet',
            'email' => 'admin@admin.nl',
            'birth' => '1997-02-19',
            'platform' => 'playstation',
            'role' => '1',
            'has_discord' => false,
            'avatar' => '/images/seed/user/face1.jpg',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],[
            'username' => 'mod',
            'nickname' => 'johannes',
            'email' => 'host@host.nl',
            'birth' => '1997-02-19',
            'platform' => 'steam',
            'role' => '2',
            'has_discord' => false,
            'avatar' => '/images/seed/user/face2.jpg',
            'password' => Hash::make('mod'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
            'username' => 'user',
            'nickname' => 'aa',
            'email' => 'host2@host2.nl',
            'birth' => '1997-02-19',
            'platform' => 'nintendo-switch',
            'role' => '3',
            'has_discord' => false,
            'password' => Hash::make('user'),
            'avatar' => '/images/seed/user/face3.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],[
            'username' => 'w00rdgrap',
            'nickname' => 'llol',
            'email' => 'joeryvanegmond@hotmail.com',
            'birth' => '1997-02-19',
            'platform' => 'xbox',
            'role' => '1',
            'has_discord' => false,
            'avatar' => '/images/seed/user/face1.jpg',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]];

        DB::table('users')->insert($users);
    }
}
