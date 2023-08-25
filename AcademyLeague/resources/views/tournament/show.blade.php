@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <img src="{{$tournament->settings()->banner}}" class="card-img-top corners p-0" />
            <div class="card-body row d-flex flex-wrap justify-content-between p-5">
                <div class="col-lg-8 col-sm-12 justify-content-sm-center d-flex flex-column">
                    <div class="card-title text-center p-4">
                        <h1>{{strtoupper($tournament->name)}}</h1>
                    </div>
                    <div class="d-flex justify-conent-sm-center">
                        <h5 class="bg-primary p-3">STARTS IN {{$tournament->timeToGo(1)}}D {{$tournament->timeToGo(2)}}H</h5>
                        <h5 class="bg-secondary p-3">{{ Carbon\Carbon::parse($tournament->settings()->start)->isoFormat('MMM. D, H:mm') }}</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 d-flex flex-column">
                    <span class="bg-success p-3 text-center"><span class="h2">1400</span><span>XP</span></span>
                    <a class="btn btn-primary btn-lg" href="#">JOIN NOW</a>
                </div>
            </div>
            <hr>
            <div class="card-footer d-flex justify-content-center">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active">
                            <h5>Overview</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <h5>Brackets</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <h5>Matches</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <h5>Participants</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <generate-bracket :bracketdata="{{ $bracketData }}"></generate-bracket>
</div>
@endsection