@extends('layouts.layout')


@section('content')

     <h1>Hot posts</h1>
        @foreach($posts as $post)
            <p><a href="/post/{{$post->id}}">{{$post->title}}</a> | {{$post->created_at}} </p>
        @endforeach

@endsection
