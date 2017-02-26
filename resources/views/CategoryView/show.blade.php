@extends('layouts.layout')


@section('content')

    <h1>{{$name}}</h1>
        @foreach($posts as $post)
            <p><a href="/post/{{$post->id}}">{{$post->title}}</a> | {{$post->likes}} likes</p>
            <form method="POST" action="/addtofavourites">
                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <button type="submit">Add to favourties</button>
            </form>
        @endforeach

@endsection
