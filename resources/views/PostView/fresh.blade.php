<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reports</title>

   </head>
    <body>
     <h1>Hot posts</h1>
        @foreach($posts as $post)
            <p><a href="/post/{{$post->id}}">{{$post->title}}</a> | {{$post->created_at}} </p>
        @endforeach
     <script src="js/appR.js"></script>
   </body>
</html>
