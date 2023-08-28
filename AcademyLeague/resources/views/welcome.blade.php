@extends('layouts.init')
<div class="themebgcolor" id="app">
    <section class="position-relative">
        <video class="home_video_banner" autoplay muted loop playsinline src="/images/welcome/welcome_banner.mp4"></video>
        <div class="container-fluid position-absolute" style="top:0; left:0;">
            @include('blocks.welcome_nav')
            <div class="row d-flex justify-content-between align-items-center" style="padding-left: 2.5rem; padding-right:2.5rem;">
                <div class="margt">
                    <div class="w-h1 maintext">THE PLATFORM THAT COMBINES ALL PLAYERS.</div>
                    <a href="{{route('register')}}" class="btn btn-lg btn-corner btn-info mt-5 me-5">Find out more.</a>
                    <a href="{{route('register')}}" class="btn btn-lg btn-corner btn-primary mt-5">Register Today</a>
                </div>
            </div>
        </div>

        <div class="see-more">
            <arrow-bottom></arrow-bottom>
        </div>

        <div class="home_discord_bottom">
        </div>
        <div class="home_info">
        </div>
    </section>

    <!-- Intro info -->
    <section class="overflow-hidden pt-2 mb-5">
        <div class="container-fluid p-0">
            <div class="row">
                <info-slider></info-slider>
            </div>
        </div>
    </section>
    
 <!-- About -->
    <section class="home_about4">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-lg-6 p-5">
                    <p class="text-start h1">// What do we offer players?</p>
                    <p>Our tournament Discord server is an exclusive online platform designed for participants to come together and take part in competitive gaming events. It acts as a central hub for organizing, scheduling, and facilitating tournaments across a wide range of games. With dedicated text and voice channels, players can easily communicate, create teams, share updates, and coordinate matches. The server offers a centralized space for players to connect, compete, and foster a strong sense of community within the gaming tournament scene.</p>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="https://guardianstournaments.gg/img/about-img1.png" class="w-65 rounded" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Games -->
    <section class="home_games overflow-hidden pt-5">
        <div class="pt-5 ps-5">
            <div class="row">
                <h1 class="m-0 h1 pb-4">Games</h1>
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
            <div class="home_discord_top">
            </div>
            <div class="home_discord_overlay">
                <div class="p-5" style="width:370px;">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-center mb-4">
                            <img class="nav-avatar-game text-center" src="https://cdn.discordapp.com/icons/1106117930825027624/a_3522fe0da744e0e8f7e756402c80a179.gif?size=128" width="100" alt="">
                        </div>
                        <h5 class="home_banner_h5 text-center">Guardians Tournaments</h5>
                        <p class="text-center">Compete against each other players on a new level.</p>
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
            <div class="home_discord_bottom">
            </div>
        </div>
</section>

    <!-- About -->
      <section class="home_about3">
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-lg-6 d-flex justify-content-center">
                <img src="https://guardianstournaments.gg/img/about-img1.png" class="w-65 rounded" alt="">
            </div>
            <div class="col-lg-6 p-5">
                <p class="text-end h1">What is our future vision? \\</p>
                <p class="text-end">At Guardians Tournaments, we're on a mission to bring players together, fostering a sense of community and camaraderie. Our inclusive LAN and online tournaments provide an exciting platform where everyone can participate and thrive. Join us for an unforgettable esports experience that celebrates diversity and collective success.</p>
            </div>
        </div>
    </div>
</section>


    <section class="home_tournaments pt-5 mb-5">
        <div class="p-5">
            <div class="row d-flex flex-wrap">
                <h1 class="text-start pb-3 h1">Tournaments</h1>
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
        <div class="container">
            <sponsor-slider :images="{{$sponsors}}"></sponsor-slider>
        </div>
    </section>

    <!-- <footer>
        <div class="container-fluid">
            <div class="row d-flex flex-column justify-content-center">
                <hr />
                <div class="col-lg-12 text-center mt-3 mb-3">
                    <img src="/images/favicon/favicon-32x32.png" alt="">
                </div>
                <div class="col-lg-12 text-center mb-3">
                    <span>© {{Carbon\Carbon::now()->year}}</span>
                    <span>{{config('app.name')}}</span>
                </div>
                <div class="col-lg-12 text-center mb-3 text-white">
                    <a href="https://www.instagram.com/guardianstournaments/" target="_blank">
                        <i class="bi bi-instagram h5 ms-2"></i>
                    </a>
                    <a href="https://www.tiktok.com/@guardianstournaments?lang=nl-NL" target="_blank">
                        <i class="bi bi-tiktok h5 ms-2"></i>
                    </a>
                    <a href="https://twitter.com/GTRocketleague" target="_blank">
                        <i class="bi bi-twitter h5 ms-2"></i>
                    </a>
                    <a href="https://discord.com/invite/NCxjv68pku" target="_blank">
                        <i class="bi bi-discord h5 ms-2"></i>
                    </a>
                    <a href="https://www.twitch.tv/guardianstournaments" target="_blank">
                        <i class="bi bi-twitch h5 ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer> -->

    <footer class="overflow-hidden pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center footer-text">
                    <img class="pe-1" src="/images/favicon/favicon-32x32.png" alt="">
                    <span class="pe-1">© {{Carbon\Carbon::now()->year}}</span>
                    <span>{{config('app.name')}}</span>
                </div>

                <div class="nav col-lg-6 d-flex justify-content-end footer-icons">
                    <a href="https://www.instagram.com/guardianstournaments/" target="_blank">
                        <i class="bi bi-instagram h5 ps-2"></i>
                    </a>
                    <a href="https://www.tiktok.com/@guardianstournaments?lang=nl-NL" target="_blank">
                        <i class="bi bi-tiktok h5 ps-2"></i>
                    </a>
                    <a href="https://twitter.com/GTRocketleague" target="_blank">
                        <i class="bi bi-twitter h5 ps-2"></i>
                    </a>
                    <a href="https://discord.com/invite/NCxjv68pku" target="_blank">
                        <i class="bi bi-discord h5 ps-2"></i>
                    </a>
                    <a href="https://www.twitch.tv/guardianstournaments" target="_blank">
                        <i class="bi bi-twitch h5 ps-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</div>