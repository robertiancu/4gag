@extends('layouts.layout')

@section('content')

    <h1 class="text-center">Favourites</h1>

    @foreach($favs as $key => $fav)
        @if(($key + 1) % 3 == 1)
            <div class="row">
        @endif
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img src="{{$fav->post->pic_url}}" alt="$fav->post->title">
              <div class="caption">
                <h3>{{$fav->post->title}}</h3>
                <p class="hide-overflow">{{$fav->post->content}}</p>
                    <a href="/post/{{$fav->post->id}}" class="btn btn-primary" role="button">View Post</a>
                    <form class="inline-form" method="POST" action="/post/{{$fav->post->id}}/like">
                         {{ csrf_field() }}
                        <button class="btn btn-default" type="submit">Like</button>
                    </form>
              </div>
            </div>
          </div>
        @if(($key + 1) % 3 == 0)
            </div>
        @endif
    @endforeach

@endsection
