@extends('layouts.app')

@section('content')
<div class="container">
    <user-edit :user="{{collect($user)}}"></user-edit>
</div>


@endsection