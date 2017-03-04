@extends('layouts.layout')


@section('content')

    <h1 class="text-center">Fresh posts</h1>

    @include('PostView.postlist');

@endsection
