@extends('layouts.init')
<div class="themebgcolor" id="app">
    <section class="position-relative">
        <video class="home_video_banner" autoplay muted loop playsinline src="/images/welcome/welcome_banner.mp4"></video>
        <div class="container-fluid position-absolute" style="top:0; left:0;">
            @include('blocks.nav')
            <div class="row align-items-center justify-content-between" style="padding-left: 2.5rem; padding-right:2.5rem;">
                <div class="col-lg-12">
                    <div class="h1 bold">The ultimate tournament gaming platform</div>
                    <a href="{{route('register')}}" class="btn btn-lg btn-info mt-5 me-5" style="font-size: 1.5rem;">Learn more</a>
                    <a href="{{route('register')}}" class="btn btn-lg btn-primary mt-5" style="font-size: 1.5rem;">Register today!</a>
                </div>
            </div>
        </div>
        <div class="home_discord_bottom">
        </div>
        <div class="home_info">
        </div>
    </section>

    <!-- Games -->
    <section class="home_sponsors pb-5">
        <div class="container-fluid p-0">
            <h1 class="text-center">Available</h1>
            <game-slider :images="{{$gameAvatars}}"></game-slider>
        </div>
    </section>

    <!-- <section class="home_discord">
        <div class="container-fluid">

            <div class="game-background" style="width: 200px; height: 100%;">
                <img src="/images/test/Achtergrond/rocketleague.png" width="200" alt="Game banner" class="corners game-overlay p-0 m-0">
                <img src="/images/test/Gameitems/rocketleague.png" width="200" alt="Game banner" class="corners game-overlay p-0 m-0">
            </div>
    </section> -->

    <!-- Discord server info -->
    <section class="home_discord">
        <div class="container">
            <!-- top shadow inset -->
            <div class="home_discord_top">
            </div>
            <div class="home_discord_overlay">
                <div class="corners p-5" style="width:370px;">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-center mb-4">
                            <img class="nav-avatar-game text-center" src="https://cdn.discordapp.com/icons/1106117930825027624/a_3522fe0da744e0e8f7e756402c80a179.gif?size=128" width="100" alt="">
                        </div>
                        <h5 class="home_banner_h5 mb-5 text-center">Guardians Tournaments Discord Server</h5>
                        <!-- <p>The Guardians Tournament Discord server gives players a change to compete against each other on a higher level</p> -->
                        <a href="https://discord.com/invite/NCxjv68pku" target="_blank" class="btn btn-lg discord-btn d-flex justify-content-center align-items-center">
                            <i class="bi bi-discord h1 m-0"></i>
                            <span class="ms-2">Join community</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- text content -->
            <div class="home_discord_bottom">

            </div>

            <!-- down shadow inset -->
            <div class="row d-flex home_discord_bottom">

            </div>
        </div>
    </section>



    <!-- Sponsors -->
    <section>
        <!-- <games-slider :images="{{$gameAvatars}}"></games-slider> -->
        <div class="container-fluid">
            <sponsor-slider :images="{{$sponsors}}"></sponsor-slider>
        </div>
    </section>

    <section class="home_tournaments">
        <div class="container-fluid">
            <div class="home_discord_top">
            </div>
            <div class="row d-flex flex-wrap mt-5 justify-content-start">
                @foreach ($tournaments as $tournament)
                <a href="{{route('tournament.show',$tournament->id)}}" class="col-md-3 mb-4">
                    <div class="card" style="min-height:250px">
                        <img src="{{$tournament->settings()->banner}}" class="card-img-top-sm corners m-0 p-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{$tournament->user()->avatar}}" class="rounded-circle me-2" width="30" alt="">
                                <div class="card-title h5 m-0" style="font-weight: bold;">{{$tournament->name}}</div>
                            </div>
                            <div class="card-text text-muted mt-1">{{$tournament->startIsoFormat()}}</div>
                            <div class="corners bg-info mt-3 mb-3" style="width:fit-content;"><span>{{$tournament->game()->name}}</span></div>

                            <div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" style="width:{{ ($tournament->participants()->count()/$tournament->settings()->team_amount)*100 }}%;" role="progressbar" aria-valuemin="{{($tournament->participants()->count()/$tournament->settings()->team_amount)*100}}" aria-valuemax="{{ $tournament->settings()->team_amount }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between text-muted mt-1">
                                    <span>{{$tournament->settings()->team_amount}} slots</span>
                                    <span>{{$tournament->settings()->team_amount-$tournament->participants()->count()}} left</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

</div>