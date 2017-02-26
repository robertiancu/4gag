@extends('layouts.layout')


@section('content')

    <h1>Admins</h1>
    @foreach($admins as $admin)
        <p>
            <a href="/user/{{$admin->user->id}}">
                {{$admin->user->name}}
            </a>
             - rank {{$admin->rank}} - set new rank
        </p>
    @endforeach
@endsection
