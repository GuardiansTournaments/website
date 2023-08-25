@include('layouts.init')

<body class="themebgcolor">
    <div class="circlebg1"><img class="img-fluid" src="/img/circlebg19.svg" alt="img"></div>
    <div class="circlebg2"><img class="img-fluid" src="/img/circlebg20.svg" alt="img"></div>
    <div class="circlebg3"><img class="img-fluid" src="/img/circlebg21.svg" alt="img"></div>
    <div class="container-fluid">
        @include('blocks.breadcrumb')
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-4">
                <div class="card p-5">
                    <div class="card-title">
                        <h2 class="text-center">Login</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="username" class="col-form-label text-md-end">{{ __('Username') }}</label>
                                <input id="username" placeholder="Enter your username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                <input id="password" placeholder="Enter your password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                                @error('password')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                @if (Route::has('password.request'))
                                <a class="text-center" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            <hr />

                            <div class="form-group mb-3">
                                <a href="{{route('discord.login')}}" class="btn discord-btn btn-lg w-100">
                                    <i class="bi bi-discord"></i>
                                    <span>Login with Discord</span>
                                </a>
                                @error('discord')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @endif
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>
</body>