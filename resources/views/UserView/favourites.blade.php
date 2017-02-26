@extends('layouts.layout')

@section('content')

    <h1>Favourites</h1>
        @foreach($favs as $fav)
            <p><a href="/post/{{$fav->post->id}}">{{$fav->post->title}}</a> | {{$fav->post->likes}} likes</p>

            <form method="POST" action="/favourites/{{$fav->id}}/delete">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit">Delete</button>
            </form>
        @endforeach

@endsection
