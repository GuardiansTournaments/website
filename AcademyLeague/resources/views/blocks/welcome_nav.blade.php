<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid ms-3 mt-5 mb-5">
        <div class="col-md-2 d-flex">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{URL::asset('img/logo.png')}}" width="180rem" alt="logo">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon sr-only"></span>
        </button>
        <div class="collapse navbar-collapsed test" id="navbarNavDarkDropdown">
            <ul class="navbar-nav me-auto" id="nav-list">
                <div class="nav-item d-flex justify-content-end">
                    <button class="navbar-toggler close mt-5" aria-label="close" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @guest
                @if (Route::has('login'))
                <div class="nav-item me-3">
                    <a class="nav-link" href="{{ route('login') }}">
                        LOGIN
                    </a>
                </div>
                @endif

                @if (Route::has('register'))
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                </div>
                @endif
                <hr />
                @else
                @if(Auth::check())
                <div class="nav-item">
                    <a class="" href="/user/{{ Auth::user()->id }}" role="button">
                        <img src="{{Auth::user()->avatar}}" class="rounded-circle" style="margin-right:10px;" width="30" height="30" alt="">
                        <span class="pl-5">{{ Auth::user()->username }}</span>
                    </a>
                </div>
                <hr />
                @endif
                @endguest
                <div class="nav-item ">
                    <a href="{{ route('tournament.index') }}" class="nav-link">
                        TOURNAMENTS
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        LEADERBOARDS
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('team.index') }}" class="nav-link">
                        TEAMS
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        SOCIALS
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('team.index') }}" class="nav-link">
                        SETTINGS
                    </a>
                </div>
                <div class="nav-item">
                    <a class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('LOGOUT') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </ul>
        </div>
        <div class="col-lg-4 d-none d-lg-flex align-items-center justify-content-end pe-4">
            @guest
            @if (Route::has('login'))
            <div class="nav-item me-3 d-flex">
                <a class="nav-link me-3" href="{{ route('login') }}">
                    Login
                </a>
                <span>|</span>
            </div>
            @endif
            @if (Route::has('register'))
            <div class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>
            @endif
            @else
            @if(Auth::check())
            <div class="nav-item">
                <a class="align-middle text-decoration-none text-white dropdown-toggle" id="navbarDropdown" href="#" aria-labelledby="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{Auth::user()->avatar}}" class="rounded-circle avatar" style="margin-right:10px;" width="30" height="30" alt="">
                    <span class="pl-5">{{ Auth::user()->username }}</span>
                </a>
                <div class="dropdown">
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{route('user.show', auth()->user())}}" class="dropdown-item">
                            <span href="{{route('user.show', auth()->user())}}">Profile</span>
                        </a>
                        <!--<a href="{{ route('user.edit', auth()->user()) }}" class="dropdown-item">
                            <span>Settings</span>
                        </a> -->
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
            @endif
            @endguest
        </div>
    </div>
</nav>