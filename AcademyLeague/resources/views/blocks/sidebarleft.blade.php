    @if(auth::check())
    <div class="row d-none d-lg-block">
        <div id="sidebar" class="col-lg-12 d-flex flex-wrap justify-content-center">
            <a href="{{route('home')}}" class="mb-2 w-100 d-flex flex-wrap justify-content-center">
                <i class="bi bi-grid-1x2-fill h2"></i>
            </a>
            <a href="#" class="mb-2 w-100 d-flex flex-wrap justify-content-center">
                <i class="bi bi-play-fill h1"></i>
            </a>
            <a href="#" class="mb-2 w-100 d-flex flex-wrap justify-content-center">
                <i class="bi bi-trophy-fill h2"></i>
            </a>
            <a href="{{route('user.edit',auth()->user()->id)}}" class=" w-100 d-flex flex-wrap justify-content-center">
                <i class="bi bi-sliders2 h2"></i>
            </a>

        </div>
        <div class="col-lg-12 d-flex flex-wrap justify-content-center">
            <hr class="w-50" />
            @foreach ($games as $game)
            <a href="{{route('user.show',auth()->user()).'?game='.$game->id}}" class="col-lg-12 d-flex flex-wrap justify-content-center">
                <img src="{{$game->avatar}}" class="mb-3 nav-avatar-game rounded-circle">
            </a>
            @endforeach
        </div>
    </div>
    @endguest