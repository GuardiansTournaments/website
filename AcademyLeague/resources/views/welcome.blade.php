@extends('layouts.init')
<div class="themebgcolor" id="app">
    <section class="position-relative">
        <video class="home_video_banner" autoplay muted loop playsinline src="/images/welcome/welcome_banner.mp4"></video>
        <div class="container-fluid position-absolute" style="top:0; left:0;">
            @include('blocks.welcome_nav')
            <div class="row d-flex justify-content-between align-items-center" style="padding-left: 2.5rem; padding-right:2.5rem;">
                <div class="col-lg-5 col-md-10 col-xl-4">
                    <div class="w-h1 maintext">THE PLATFORM THAT COMBINES ALL PLAYERS.</div>
                    <a href="{{route('register')}}" class="btn btn-lg btn-corner btn-info mt-5 me-5">Find out more.</a>
                    <a href="{{route('register')}}" class="btn btn-lg btn-corner btn-primary mt-5">Register Today</a>
                </div>
            </div>
        </div>

        <!-- <div class="see-more">
            <i class="bi bi-arrow-down see-more-icon"></i>
        </div> -->

        <div class="home_discord_bottom">
        </div>
        <div class="home_info">
        </div>
    </section>

    <!-- Intro info -->
    <section class="pb-5 overflow-hidden pt-2">
        <div class="container-fluid p-0">
            <div class="row pb-5">
                <info-slider></info-slider>
            </div>
        </div>
    </section>

     <section class="home_discord">
        <div class="container">
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
        </div>
    </section>


    <!-- Games -->
    <section class="home_games pb-5 overflow-hidden">
        <div class="p-5">
            <div class="row">
                <h1 class="m-0">Games</h1>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row">
                <game-slider></game-slider>
            </div>
        </div>
    </section>

    <!-- Discord server info -->
    <section class="home_discord">
        <div class="container">
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
        </div>
    </section>


    <section class="home_tournaments pt-5">
        <div class="p-5">
            <div class="row d-flex flex-wrap">
                <h1 class="text-start mb-3">Tournaments</h1>
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
        <div class="container-fluid">
            <sponsor-slider :images="{{$sponsors}}"></sponsor-slider>
        </div>
    </section>

    <footer>
        <div class="container-fluid">
            <div class="row d-flex p-5 justify-content-between opacity:0.5;">
                <hr />
                <div class="d-flex justify-content-between m-0 mt-4 p-0">
                    <div class="col-lg-6 text-muted">
                        <img src="/images/favicon/favicon-32x32.png" alt="">
                        <span>© {{Carbon\Carbon::now()->year}}</span>
                        <span>{{config('app.name')}}, Inc</span>
                    </div>
                    <div class="col-lg-6 text-end">
                        <a href="https://www.instagram.com/guardianstournaments/">
                            <i class="bi bi-instagram h5 ms-2" target="_blank"></i>
                        </a>
                        <a href="https://www.tiktok.com/@guardianstournaments?lang=nl-NL">
                            <i class="bi bi-tiktok h5 ms-2" target="_blank"></i>
                        </a>
                        <a href="https://twitter.com/GTRocketleague">
                            <i class="bi bi-twitter h5 ms-2" target="_blank"></i>
                        </a>
                        <a href="https://discord.com/invite/NCxjv68pku" target="_blank">
                            <i class="bi bi-discord h5 ms-2"></i>
                        </a>
                        <a href="https://www.twitch.tv/guardianstournaments">
                            <i class="bi bi-twitch h5 ms-2" target="_blank"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>