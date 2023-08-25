@extends('layouts.app')

@section('content')
    
    @if (Auth::check())
    @if (auth()->user()->isTeamLeader($team->id))
    <div class="row d-flex justify-content-end mb-5">
        <div class="col-lg-4 d-flex justify-content-end">
            @if($team->invite())
            <div class="input-group input-group-lg">
                <div class="input-group-lg">
                    <a href="/teaminvite/{{$team->id}}" class="input-group-prepend input-group-text btn btn-primary btn-lg">Recreate code</a>
                </div>
                <input type="text" class="form-control text-center bg-secondary" value="{{ $team->invite()->isExpired() ? 'Code expired' : $team->invite()->code}}" readonly>
            </div>
            @else
            <a href="/teaminvite/{{$team->id}}" class="btn btn-primary btn-lg">Create invite code</a>
            @endif

        </div>
    </div>
    @endif
    @endif
    <div class="row">
        <div class="col-lg-8">
            <div class="card overflow-scroll" style="height:250px;">
                <div class="card-body d-flex ">
                    <div class="card-title">
                        <h2>{{$team->name}}</h2>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <!-- buttons or something else -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card overflow-scroll">
                <div class="card-body">
                    <div class="card-title">
                    <h5>Members</h5>
                    </div>
                    <table class="table table-hover table-borderless">
                        <tbody>
                            @foreach ($team->teamMembers() as $teamMember)
                            <tr class="align-middle clickable" onclick="window.location='{{route('user.show', $teamMember->user_id)}}'">
                                <td>
                                    <img src="{{$teamMember->user()->avatar}}" class="rounded-circle" style="margin-right:10px;" width="30" height="30" alt="user avatar">
                                    {{ $teamMember->user()->username }}
                                </td>
                                <td class="d-flex justify-content-end">{{ $teamMember->role->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h2>Stats</h2>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    stat1
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    stat2
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    stat3
                </div>
            </div>
        </div>
    </div>
@endsection