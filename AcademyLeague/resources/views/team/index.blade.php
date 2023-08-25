@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Discover Teams</h2>
        <div class="col-md-4">
            <select id="platform" name="platform" class="form-select @error('platform') is-invalid @enderror mb-5" value="platform" selected="Steam" required>
                <option value="" disabled selected hidden>Rank</option>
                <option value="x">x</option>
            </select>
        </div>
    </div>
    <div class="row">
        @foreach ($teams as $team)
        <div class="col-lg-4">
            <a href="{{ route('team.show', $team->id)}}" class="card text-decoration-none text-white">
                <div class="card-body">
                    <card class="title">
                        <h2>{{ $team->name }}</h2>
                    </card>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-end">
                    <div><span class="me-1">{{ $team->teamMembers()->count() }}</span><span>{{ $team->teamMembers()->count() > 1 ? 'members' : 'member'}}</span></div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection