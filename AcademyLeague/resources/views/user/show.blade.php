@extends('layouts.app')

@section('content')
<div class="container banner" style="--banner-color:{{$user->banner_color}}; --banner-image: url({{$user->banner}});">
    <div class="row mb-5">
        <div class="col-lg-12 d-flex align-items-center mb-4">
            <img class="rounded-circle me-4" height="100" width="100" src="{{$user->avatar }}" alt="">
            <div class="">
                <h1>{{strtoupper($user->username)}}</h1>
                <h5>{{strtoupper($user->nickname)}}</h5>
                <!-- <div>
                    @if ($user->teamMember())
                    <a href="{{ route('team.show', $user->teamMember()->team()->id) }}" class="highlight h5 text-decoration-none text-white">{{ $user->teamMember() ? $user->teamMember()->team()->name : "Teamless"}}</a>
                    @endif
                </div> -->
            </div>
        </div>
        <div class="col-lg-6 d-flex">
            <h5 class="me-4 d-flex align-items-center">
                <i class="bi bi-fire h5 me-2 m-0"></i>
                <span>0</span>
            </h5>
            <h5 class="me-4 d-flex align-items-center">
                <i class="bi bi-heart-pulse-fill me-2"></i>
                <div>
                    <span>0.0</span>
                </div>
            </h5>
            <h5 class="col-lg-3 col-sm-4 d-flex align-items-center"><i class="bi bi-{{ strtolower($user->platform) }} h2"></i></h5>
        </div>

    </div>
    @include('tournament.index')
</div>
@endsection