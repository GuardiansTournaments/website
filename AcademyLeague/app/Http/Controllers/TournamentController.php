<?php

namespace App\Http\Controllers;

use App\Http\Requests\tournament\StoreTournamentRequest;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Game;
use App\Models\TournamentSettings;
use App\Helpers\ImageManager;

class TournamentController extends Controller
{

    public function __constructor(StoreTournamentRequest $storeTournamentRequest)
    {
        $this->storeTournamentRequest = $storeTournamentRequest;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('tournament.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::all();
        return view('host.tournament.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTournamentRequest $request)
    {
        
        $path = ImageManager::uploadImage($request->file('banner'), $request['name'], "tournament_banner");
        $request = $request->all();
        $request['user_id'] = auth()->user()->id;
        $tournament = Tournament::Create($request);
        $request['banner'] = $path;
        $request['tournament_id'] = $tournament->id;
        TournamentSettings::Create($request);

        return response()->json(['route' => $tournament->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        //generate bracket info
        $bracketData = collect([
            "rounds" => $tournament->numOfRounds() ?? 0,
            "teams" => $tournament->teams() ?? [],
        ]);
        $bracketData = json_encode($bracketData);
        return view('tournament.show', compact('tournament','bracketData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        return view('host.tournament.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        //
    }
}
