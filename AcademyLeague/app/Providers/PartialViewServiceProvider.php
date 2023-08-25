<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Game;
use App\Models\Tournament;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class PartialViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        // Leftsidebar games
        View::composer('blocks.sidebarleft', function ($view) use ($request) {
            $games = Game::all();
            $view->with(['games' => $games]);
        });

        // Tournaments on userprofile with optional query (game) filter
        $query = $request->query('game');
        View::composer('tournament.index', function ($view) use ($query) {
            $tournaments = ($query ? Tournament::where('game_id', $query)->get() : Tournament::all());
            $view->with([
                'tournaments' => $tournaments->count() ? $tournaments : Tournament::all(),
                'tournamentsnotfound' => !$tournaments->count() ? "No tournaments for this game" : null
            ]);
        });

        // Rightsidebar team + teammembers
        View::composer('blocks.sidebarright', function ($view) use ($request) {
            $me = auth()->user();
            $team = $me->teamMember();
            $view->with(['team' => $team ? $team->team() : null, 'self' => $me]);
        });

        // Welcome page (games + tournaments)
        View::composer('welcome', function ($view) use ($request) {
            $games = Game::all();

            // Produce array with only avatar and ID
            $gameAvatars = $games->map(function ($game) {
                return ['id'=> $game->id,'image'=>$game->avatar];
            });
            $sponsors = collect();
            // Produce static array with seed sponsor images
            for ($i=1; $i < 6; $i++) { 
                $sponsors->push([
                    'id' => $i,
                    'image' => 'images/welcome/sponsors/sponsor'.$i.'.png'
                ]);
            }

            $tournaments = Tournament::all()->take(4);
            $view->with([
                'games' => $games, 
                'tournaments'=>$tournaments,
                'gameAvatars'=>$gameAvatars,
                'sponsors'=>$sponsors,
            ]);
        });
    }
}
