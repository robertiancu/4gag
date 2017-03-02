@extends('layouts.layout')


@section('content')

    <h1 class="text-center">New post</h1>

    <form method="POST" action="/newpost/submit">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputTitle">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="inputUrl">URL</label>
            <input type="text" class="form-control" name="url" placeholder="URL of your picture">
        </div>
        <div class="form-group">
            <label for="inputCategory">Select Category</label>
            <select class="form-control" name="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="inputContet">Content</label>
            <textarea class="form-control" name="content" rows="3"></textarea>
        </div>
        <button type="submit">Submit post</button>
    </form>

@endsection
