@extends('layouts.layout')


@section('content')

    <h1 class="text-center">{{$name}}</h1>

    @include('PostView.postlist');

@endsection
