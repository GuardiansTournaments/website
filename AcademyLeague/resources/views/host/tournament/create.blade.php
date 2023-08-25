@extends('layouts.app')

@section('content')
@include('blocks.breadcrumb')
<tournament-create :games="{{ $games }}"></tournament-create>
@endsection