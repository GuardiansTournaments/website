@extends('layouts.init')
<div class="themebgcolor" id="app">
    <section class="position-relative">
        <video class="home_video_banner" autoplay muted loop playsinline src="/images/welcome/welcome_banner.mp4"></video>
        <div class="container-fluid position-absolute" style="top:0; left:0;">
            @include('blocks.welcome_nav')
            <div class="row d-flex justify-content-between align-items-center" style="padding-left: 2.5rem; padding-right:2.5rem;">
                <div class="col-lg-4">
                    <div class="w-h1">THE PLATFORM THAT COMBINES ALL PLAYERS.</div>
                    <a href="{{route('register')}}" class="btn btn-lg btn-corner btn-info mt-5 me-5">Find out more.</a>
                    <a href="{{route('register')}}" class="btn btn-lg btn-corner btn-primary mt-5">Register Today</a>
                </div>
            </div>
        </div>
        <div class="home_discord_bottom">
        </div>
        <div class="home_info">
        </div>
    </section>

    <!-- Intro info -->
    <section class="pb-5">

        <div class="container p-0">
            <div class="row d-flex justify-content-around">
                <div class="col-lg-3 d-flex flex-column">
                    <div class="text-center w-h1 mb-3">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="h5 bold text-center">Tournaments</div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="text-center" style="width:250;">Join and play with friends.</div>
                    </div>
                </div>

                <!-- Matchmaking -->
                <div class="col-lg-3 d-flex flex-column">
                    <div class="text-center w-h1 mb-3">
                       <i class="bi bi-search"></i>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="h5 bold text-center">Matchmaking</div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="text-center" style="width:250;">Pre-game training matches.</div>
                    </div>
                </div>

                <div class="col-lg-3 d-flex flex-column">
                    <div class="text-center w-h1 mb-3">
                        <i class="bi bi-award"></i>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="h5 bold text-center">Competition</div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="text-center" style="width:250;">Contest to be number one.</div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex flex-column">
                    <div class="text-center w-h1 mb-3">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="h5 bold text-center">Community</div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="text-center" style="width:250;">Reach out to other players.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Games -->
    <section class=" pb-5">
        <div class="container-fluid p-0">
            <h1 class="text-start p-5">Available games</h1>
            <game-slider></game-slider>
        </div>
    </section>

    <!-- Discord server info -->
    <section class="home_discord">
        <div class="container">
            <!-- top shadow inset -->
            <!-- <div class="home_discord_top">
            </div> -->
            <div class="home_discord_overlay">
                <div class="corners p-5" style="width:370px;">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-center mb-4">
                            <img class="nav-avatar-game text-center" src="https://cdn.discordapp.com/icons/1106117930825027624/a_3522fe0da744e0e8f7e756402c80a179.gif?size=128" width="100" alt="">
                        </div>
                        <h5 class="home_banner_h5 text-center">Guardians Tournaments</h5>
                        <p class="text-center">The Guardians Tournament Discord server gives players a change to compete against each other on a new level.</p>
                        <div class="d-flex justify-content-center">
                            <a href="https://discord.com/invite/NCxjv68pku" target="_blank" class="btn discord-btn d-flex justify-content-center align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-discord mt-2 h4"></i>
                                    <span class="ms-2 me-1">Discord server</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- text content -->
            <!-- <div class="home_discord_bottom">

            </div> -->

            <!-- down shadow inset -->
            <!-- <div class="row d-flex home_discord_bottom">

            </div> -->
        </div>
    </section>

    <section class="home_tournaments">
        <div class="container">
            <!-- <div class="home_discord_top">
            </div> -->
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
                            <div class="round bg-info mt-3 mb-3" style="width:fit-content;"><span>{{$tournament->game()->name}}</span></div>

                            <div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" style="width:{{ ($tournament->participants()->count()/$tournament->settings()->team_amount)*100 }}%;" role="progressbar" aria-valuemin="{{($tournament->participants()->count()/$tournament->settings()->team_amount)*100}}" aria-valuemax="{{ $tournament->settings()->team_amount }}">
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


    <!-- Sponsors -->
    <section>
        <!-- <games-slider :images="{{$gameAvatars}}"></games-slider> -->
        <div class="container-fluid">
            <sponsor-slider :images="{{$sponsors}}"></sponsor-slider>
        </div>
    </section>
</div>

