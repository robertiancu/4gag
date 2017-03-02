@extends('layouts.layout')


@section('content')

    <h1 class="text-center">{{$post->title}}</h1>
    <img class="img-responsive center-block" src="{{$post->pic_url}}" alt"{{$post->title}}">
    <form class="inline-form" method="POST" action="/post/{{$post->id}}/like">
         {{ csrf_field() }}
        <button class="btn btn-default" type="submit">Like</button>
    </form>

    <form class="inline-form" method="POST" action="/post/{{$post->id}}/delete">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <button class="btn btn-default" type="submit">Delete</button>
    </form>


    <form class="inline-form" method="POST" action="/addtofavourites">
        {{ csrf_field() }}
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <button class="btn btn-default" type="submit">Add to favourties</button>
    </form>

    <form method="POST" action="/post/{{$post->id}}/report">
        {{ csrf_field() }}
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <textarea name="reason"></textarea>
        <button class="btn btn-default" type="submit">Report</button>
    </form>

    <br>

    <h2>Comments</h2>

    <form method="POST" action="/post/{{$post->id}}/comment">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputComment">Add a comment</label>
            <textarea class="form-control" name="comment_text" rows="3"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Comment</button>
    </form>

    @foreach($comments as $key => $comment)

        <div>
        <p>{{$key + 1}}.{{$comment->content}}</p>
        <p>Comment by {{$comment->user->name}}</p> 
        <p>{{$comment->likes}} likes</p>

        <form class="inline-form" method="POST" action="/comment/{{$comment->id}}/like">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <button class="btn btn-default" type="submit">Like</button>
        </form>

        <form class="inline-form" method="POST" action="/comment/{{$comment->id}}/delete">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <button class="btn btn-default" type="submit">Delete</button>
        </form>

        </div>

    @endforeach

@endsection
