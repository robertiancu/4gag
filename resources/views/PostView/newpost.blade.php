@extends('layouts.layout')


@section('content')

    <form method="POST" action="/newpost/submit">
        {{ csrf_field() }}
        Title
        <input type="text" name="title">
        <br>
        URL
        <input type="text" name="url">
        <br>
        Category
        <select name="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
        </select>
        <br>
        Content
        <textarea name="content"></textarea>
        <br>
        <button type="submit">Submit post</button>
    </form>

@endsection
