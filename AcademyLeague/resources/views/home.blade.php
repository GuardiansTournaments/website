@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <img class="rounded-circle" height="100" width="100" src="{{ Auth::user()->avatar }}" alt="">
                </div>
                <div class="col-lg-12 mt-2">
                    <h1>{{Auth::User()->username}}</h1>
                    <h5>No team</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h5>Team members</h5>
            <div class="card text-white border-0" style="height:250px;">
                <div class="card-body d-flex flex-column">
                    <p class="card-text">No members found</p>
                    <!-- <a href="#" class="mt-auto btn btn-primary">Join team</a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex flex-wrap">
        <h5>My achievements</h5>
        <div class="col-lg-4">
            <div class="card text-white border-0" style="height:250px;">
                <div class="card-body d-flex flex-column">
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-white border-0" style="height:250px;">
                <div class="card-body d-flex flex-column">
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-white border-0" style="height:250px;">
                <div class="card-body d-flex flex-column">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h5>Player information</h5>
            <div class="card text-white border-0" style="height:250px;">
                <div class="card-body d-flex flex-column">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection