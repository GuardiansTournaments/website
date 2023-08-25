@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex position-relative">
        <overlay-discord-connect :showmodal="{{ $hasDiscord }}"></overlay-discord-connect>
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <div class="card-title">
                        <h2>Team</h2>
                    </div>
                    <p class="card-text">
                        Create team for a specific game, be a teamcaptain and join tournaments.
                    </p>
                    <a href="{{route('team.create')}}" class="btn btn-lg btn-primary mt-auto">Create team</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <div class="card-title">
                        <h2>Organization</h2>
                    </div>
                    <p class="card-text">
                        With a organization it is possible to manage multiple teams, set teamcaptains etc.
                    </p>
                    <div class="btn btn-lg btn-primary mt-auto">Create organization</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card">
                <img src="{{asset('storage/images/seed/join_team.png')}}" alt="" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <div class="card-title">
                        <h2>Join</h2>
                    </div>
                    <p class="card-text">
                        Join a existing team or organization with invite code.
                    </p>
                    <form action="{{ route('teaminvite.accept') }}" method="POST">
                        <form>
                            @csrf
                            <div class="form-group mb-4">
                                <input class="form-control" name="code" type="text" placeholder="Enter invite code">
                                @error('code')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg mt-auto w-100">
                                Join
                            </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection