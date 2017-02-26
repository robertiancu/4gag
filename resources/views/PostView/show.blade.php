@extends('layouts.layout')


@section('content')

    <h1>{{$post->title}}</h1>
     <form method="POST" action="/post/{{$post->id}}/delete">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <button type="submit">Delete</button>
     </form>


    <form method="POST" action="/post/{{$post->id}}/report">
        {{ csrf_field() }}
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <textarea name="reason"></textarea>
        <button type="submit">Report</button>
    </form>

    <br>

    <h2>Comments</h2>

    @foreach($comments as $key => $comment)
        <p>{{$key+1}}.{{$comment->content}}</p>
        <p>Comment by {{$comment->user->name}}</p> 
        <p>{{$comment->likes}} likes</p>

        <br>

    @endforeach

@endsection
