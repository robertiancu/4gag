@extends('layouts.layout')


@section('content')

    <h1>{{$user->name}}</h1>
    @if($haveAdmin==false)
    <form method='POST' action='/admins'>
        {{ csrf_field() }}
        <input type="hidden" name='user_id' value={{$user->id}}>
        <button type="submit">Make admin</button>
    </form>
    @else
    <form method='POST' action='/user/{{$user->id}}/setrank'>
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name='setrank' value="1">
        <button type="submit">Rank Up</button>
    </form>

    <br>

    <form method='POST' action='/user/{{$user->id}}/setrank'>
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name='setrank' value="-1">
        <button type="submit">Rank Down</button>
    </form>

    <br>

    <form method='POST' action='/user/{{$user->id}}/takeadmin'>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="hidden" name='user_id' value="{{$user->id}}">
        <button type="submit">Take Admin</button>
    </form>

    @endif

@endsection
