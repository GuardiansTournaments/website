@if(auth::check())
<div class="row d-none d-lg-block">
    <div class="col-lg-12 d-flex flex-wrap justify-content-center">
        @if (!$team)
        <div class="col-lg-12 d-flex justify-content-center">
            <a href="{{route('team.createOverview')}}" class="bg-secondary rounded-circle mb-3 text-center position-relative" style="width:60px; height:60px;">
                <div class="bi bi-plus h1 opacity-50 mt-2"></div>
            </a>
        </div>
        @else
        <a href="{{route('team.show', $team)}}" class="col-lg-12 d-flex justify-content-center">
            <img src="{{$team->banner}}" class="bg-secondary rounded-circle mb-3" style="width:60px; height:60px;" />
        </a>

    </div>
    <div class="col-lg-12 d-flex flex-wrap justify-content-center">
        <hr class="w-50" />
        @foreach ($team->teamMembers() as $teamMember)
        @if ($teamMember != $self->teamMember())
        <a href="{{route('user.show', $teamMember->user())}}" class="col-lg-12 d-flex justify-content-center">
            <img src="{{$teamMember->user()->avatar}}" class="bg-success nav-avatar-team mb-3 rounded-circle" />
        </a>
        @endif
        @endforeach
        @endif
    </div>
</div>
@endif