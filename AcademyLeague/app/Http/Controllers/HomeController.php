<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Game;
use App\Enums\UserRoleEnum;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (auth()->user()->role) {
            case UserRoleEnum::Admin:
                return view('admin.home', Self::admin());
                break;
            case UserRoleEnum::Host:
                return view('host.home', Self::host());
            case UserRoleEnum::User:
                return view('user.show', ['user'=>auth()->user()]);
        }
    }

    private function admin()
    {
        /*ADMIN HOSTS*
         * show list of hosts
         * make it possible to log in as host
         * NOTE: host need to have a account (discord login)
         */
        $hosts = User::select('id', 'username', 'avatar')->where('role', '2')->get();

        $games = Game::all();

        /*ADMIN GAMES*
         * show list of games
         * make it possible to add / edit / delete game
         */
        return compact('hosts', 'games');
    }

    private function host()
    {
        /**
         * Show rows of tournament
         * Show Tournament name
         * Show Tournament game type
         * Show number of participants
         * Show edit button
         * Show show button
         * Show remove button
         */

        $tournaments = auth()->user()->tournaments();
        // $partis = $tournaments->first()->participants()->first();
        // $teams = $partis->team();
        return compact('tournaments');
    }
}
