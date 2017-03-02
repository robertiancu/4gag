@extends('layouts.layout')


@section('content')

    <h1 class="text-center">Admins</h1>

    <div class="panel panel-default">
        <div class="panel-heading">Admins List</div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Join date</th>
                    <th>Admin level</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $key => $admin)
                    <tr>
                        <th>
                            {{$key + 1}}
                        </th>
                        <th>
                            <a href="/user/{{$admin->user->id}}">
                                {{$admin->user->name}}
                            </a>
                        </th>
                        <th>
                            {{$admin->user->email}}
                        </th>
                        <th>
                            {{$admin->user->created_at}}
                        </th>
                        <th>
                            {{$admin->rank}}
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
