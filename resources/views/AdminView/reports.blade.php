@extends('layouts.layout')


@section('content')

    <h1 class="text-center">Reports</h1>

    <div class="panel panel-default">
        <div class="panel-heading">Reports</div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Report</th>
                    <th>Author</th>
                    <th>Post</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $key => $report)
                    <tr>
                        <th>
                            {{$key + 1}}
                        </th>
                        <th>
                            {{$report->reason}}
                        </th>
                        <th>
                            <a href="/user/{{$report->user->id}}">
                                {{$report->user->name}}
                            </a>
                        </th>
                        <th>
                            <a href="/post/{{$report->post->id}}">
                                {{$report->post->title}}
                            </a>
                        </th>
                        <th>
                            {{$report->created_at}}
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
