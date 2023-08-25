<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\TeamInvite;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\TeamMember;
use App\Enums\TeamMemberRoleEnum;
use App\Enums\TeamMemberStatusEnum;
use App\Http\Requests\TeamInvite\AcceptTeamInviteRequest;

class TeamInviteController extends Controller
{
    public function __constructor(AcceptTeamInviteRequest $acceptTeamInviteRequest)
    {
        $this->acceptTeamInviteRequest = $acceptTeamInviteRequest;
    }

    /**
     * Generates unique code with length of 5 characters.
     *
     * @param  \App\Models\Team  $invite
     * @return \Illuminate\Http\Response
     */
    public function generatetoken(Team $team)
    {
        do {
            $code = strtoupper(Str::random(5));
        } while (TeamInvite::where('code', $code)->first());

        //check if team already has a code


        TeamInvite::updateOrCreate([
            'team_id' => $team->id
        ], [
            'team_id' => $team->id,
            'expiration' => Carbon::now()->addHour(),
            'code' => $code,
        ]);

        return redirect('team/' . $team->id);
    }

    public function accept(AcceptTeamInviteRequest $invite)
    {
        $invite = TeamInvite::where('code', $invite->get('code'))->first();

        if ($invite->isExpired())
            return redirect()->back()->withErrors(["code" => "code is expired"]);

        $team = $invite->team();

        // Add user as a teammember of team
        TeamMember::create([
            'team_id' => $team->id,
            'user_id' => Auth::User()->id,
            'role' => TeamMemberRoleEnum::Member,
            'status' => TeamMemberStatusEnum::Accepted,
        ]);

        return redirect()->route('team.show', ['team' => $team])->with("success", "Joined " . $team->name . " successfully!");
    }
}
