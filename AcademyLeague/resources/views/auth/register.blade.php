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
                        <h2 class="text-center">Create account</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input id="username" placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('gametag')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <select id="platform" name="platform" class="form-control form-select @error('platform') is-invalid @enderror" value="platform" selected="Steam" required>
                                    <option value="" disabled selected hidden>Choose platform</option>
                                    <option value="epic">Epic</option>
                                    <option value="steam">Steam</option>
                                    <option value="playstation">Playstation</option>
                                    <option value="xbox">Xbox</option>
                                    <option value="nintendo-switch">Nintendo</option>
                                </select>
                                @error('platform')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <input id="password-confirm" placeholder="Confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group mb-3 d-flex justify-content-center mb-2">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Create account') }}
                                </button>
                            </div>
                                <hr />
                                <div class="col-md-12 d-flex justify-content-center text-decoration-none">
                                    <a href="/sign-in/discord" class="btn discord-btn w-100">
                                    <i class="bi bi-discord"></i>
                                        <span>Register with Discord</span>
                                    </a>
                                    @error('discord')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @endif
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>