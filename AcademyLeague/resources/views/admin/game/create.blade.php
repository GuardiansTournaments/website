@extends('layouts.app')

@section('content')
<div class="row">
    @include('blocks.breadcrumb')
</div>
<form action="{{ route('game.store') }}" class="row d-flex justify-content-center" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-6">
        <div class="card p-5">
            <div class="card-body">
                <div class="card-title text-center">
                    <h2>Add game</h2>
                </div>
                <!-- Title input -->
                <div class="form-group mb-3">
                    <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                    <input id="name" placeholder="Enter game name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Description input -->
                <div class="form-group mb-3">
                    <label for="description" class="col-form-label text-md-end">{{ __('Description') }}</label>
                    <textarea id="description" placeholder="Enter game description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
                    @error('description')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- avatar input -->
                <div class="form-group mb-3">
                    <label for="avatar" class="col-form-label text-md-end">{{ __('Upload avatar') }}</label>
                    <input id="avatar" placeholder="Upload game icon" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar" autofocus></textarea>
                    @error('avatar')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>


        </div>
    </div>

</form>
@endsection