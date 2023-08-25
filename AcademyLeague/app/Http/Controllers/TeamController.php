<?php

namespace App\Http\Controllers;

use App\Enums\TeamMemberRoleEnum;
use App\Models\Team;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Enums\TeamMemberStatusEnum;
use App\Http\Requests\team\StoreTeamRequest;
use App\Models\Game;

class TeamController extends Controller
{
    public function __constructor(StoreTeamRequest $storeTeamRequest)
    {
        $this->storeTeamRequest = $storeTeamRequest;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::User();
        $games = Game::all();
        return view('team.create', compact('user','games'));
    }

    public function createOverview()
    {
        $user = Auth::User();
        $hasDiscord = $user->hasDiscord();
        if($user->teamMember())
        {
            return redirect()->back()->with('error', "You already have a team");
        }
        return view('team.createOverview', compact('hasDiscord'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->description = $request->description;
        // Team::create($request->all());
        $team->save();

        TeamMember::create([
            'user_id'=>Auth::user()->id,
            'team_id'=>$team->id,
            'role' => TeamMemberRoleEnum::Captain,
            'status'=> TeamMemberStatusEnum::Accepted,
        ]);
        return redirect()->to('team/'.$team->id)->with('success', $request->name.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('team.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team = Team::find($team->id);
        $team->delete();
        return response()->json('Team deleted!');
    }
}
