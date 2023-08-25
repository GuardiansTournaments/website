@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex flex-wrap mb-2">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Moderator dashboard</h2>
        </div>
    </div>
    <div class="row d-flex flex-column">
        <div class="col-lg-12 p-2">
            <div class="card overflow-scroll" style="min-height:250px; max-height:500px;">
                <div class="card-body d-flex flex-column p-5">
                    <div class="d-flex justify-content-between">
                        <h2>Tournaments</h2>
                        <a href="{{ route('tournament.create') }}" class="corners bg-info ps-4 pe-4">
                            <span>Create</span>
                        </a>
                    </div>
                    <table class="table table-hover table-borderless">
                        <thead class="position-sticky" style="top:0;">
                            <th class="header" scope="col">Name</th>
                            <th class="header" scope="col">Game</th>
                            <th class="header" scope="col">Participants</th>
                            <th class="header" colspan="2" scope="col">Teams</th>
                        </thead>
                        <tbody>
                            @foreach ($tournaments as $tournament)
                            <tr class="align-middle">
                                <td>{{ $tournament->name }}</td>
                                <td>{{ $tournament->game()->name }}</td>
                                <td>{{ $tournament->participants()->count() }}</td>
                                <td>{{ $tournament->teams()->count() }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('tournament.show', $tournament->id) }}">
                                        <i class="bi bi-eye-fill ms-4 h5"></i>
                                    </a>
                                    <a href="{{ route('tournament.edit', $tournament->id) }}">
                                        <i class="bi bi-gear-fill ms-4 h5"></i>
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
</div>
@endsection