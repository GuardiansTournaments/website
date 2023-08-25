<div class="row d-flex justify-content-center">
    <div class="row d-flex justify-content-between align-items-center mb-4">
        <div class="col-lg-8">
            <h2 class="text-wrap">YOUR PATHWAY TO GUARDIANS GAMING</h2>
        </div>
        <div class="col-lg-2 col-sm-12 d-flex justify-content-end">
            <select id="platform" name="platform" class="form-select form-control @error('platform') is-invalid @enderror" value="platform" selected="Steam" required>
                <option value="" disabled selected hidden>Regions</option>
            </select>
        </div>
    </div>

    <div class="row d-flex flex-wrap justify-content-start">
        @if($tournamentsnotfound)
        <span class="text-danger mb-5" role="alert">
            <strong>{{ $tournamentsnotfound }}</strong>
        </span>
        @endif
        @foreach ($tournaments as $tournament)
                <a href="{{route('tournament.show',$tournament->id)}}" class="col-md-4 mb-4">
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