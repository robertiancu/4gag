@extends('layouts.layout')


@section('content')

    <h1>Rapoarte</h1>
    @foreach($reports as $report)
        <p>{{$report->reason}}</p>
    @endforeach

@endsection
