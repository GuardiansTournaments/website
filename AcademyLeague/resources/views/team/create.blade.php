@extends('layouts.app')

@section('content')
@include('blocks.breadcrumb')
<div class="row d-flex justify-content-center">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body " style="height:350px;">
                <div class="card-title d-flex justify-content-center m-4">
                    <h2>Create your team</h2>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <form action="{{ route('team.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-4 d-flex flex-column">
                            <input type="text" name="name" class="form-control-lg border-0 @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Enter name">
                            @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4 d-flex flex-column">
                            <textarea type="field" name="description" class="form-control-lg border-0" placeholder="Enter description" rows="2"></textarea>
                            @error('description')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <!-- Banner input -->
                        <div class="form-group mb-3">
                            <label for="banner" class="col-form-label text-md-end">{{ __('Upload banner') }}</label>
                            <input id="banner" placeholder="Upload banner" type="file" class="form-control @error('banner') is-invalid @enderror" name="banner" value="{{ old('banner') }}" required autocomplete="banner" autofocus></textarea>
                            @error('banner')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Game input -->
                        <div class="form-group mb-5">
                            <label for="game_id" class="col-form-label text-md-end">{{ __('Game') }}</label>
                            <select id="game_id" placeholder="Enter tournament game" type="game_id" class="form-select form-control @error('game_id') is-invalid @enderror" name="game_id" value="{{ old('game_id') }}" required autocomplete="game_id" autofocus>
                                <option value="" disabled selected hidden>Choose game</option>
                                @foreach ($games as $game)
                                <option value="{{$game->id}}">{{$game->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('game_id')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>

@endsection