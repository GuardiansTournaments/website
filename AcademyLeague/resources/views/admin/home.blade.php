@extends('layouts.app')

@section('content')
<div class="row d-flex flex-wrap">
<div class="row d-flex flex-wrap mb-2">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Administrator dashboard</h2>
        </div>
    </div>
    <div class="col-lg-8 mb-4">
        <div class="card overflow-scroll">
            <div class="card-body d-flex flex-column p-5">
                <div class="d-flex justify-content-between">
                    <h2>Moderators</h2>
                    <a href="#" class="corners bg-info ps-4 pe-4">
                        <span>Create</span>
                    </a>
                </div>
                <table class="table table-hover table-borderless">
                    <thead class="position-sticky" style="top:0;">
                        <tr>
                            <th class="header" colspan="2" scope="col">Username</th>
                            <th class="header" colspan="2" scope="col">Tournaments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $hosts as $host )
                        <tr class="align-middle">
                            <td colspan="2">
                                <img src="$host->avatar}}" class="rounded-circle me-2" width="30" alt="">
                                <span>{{ $host->username }}</span>
                            </td>
                            <td colspan="2">{{ $host->tournaments()->count() }}</td>
                            <td class="d-flex justify-content-end">
                                <a href="/user/{{ $host->id }}" class="me-3">
                                    <i class="bi bi-eye-fill ms-4 h5"></i>
                                </a>
                                <a href="/user/{{ $host->id }}/edit" class="me-3">
                                    <i class="bi bi-pencil-fill ms-4 h5"></i>
                                </a>
                                <a href="/impersonate/{{ $host->id }}" class="me-3">
                                    <i class="bi bi-person-fill-down ms-4 h5"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card overflow-scroll">
            <div class="card-body d-flex flex-column p-5">
                <div class="d-flex justify-content-between">
                    <h2>Games</h2>
                    <a href="{{ route('game.create') }}" class="corners bg-info ps-4 pe-4">
                        <span>Create</span>
                    </a>
                </div>
                <table class="table table-hover table-borderless">
                    <thead class="position-sticky" style="top:0;">
                        <tr>
                            <th class="header" colspan="1" scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                        <tr class="align-middle">
                            <td>{{ $game->name }}</td>
                            <td class="d-flex justify-content-end">
                                <a href="/game/{{ $game->id }}/edit" class="">
                                    <i class="bi bi-pencil-fill ms-4 h5"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection