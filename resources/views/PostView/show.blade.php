<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reports</title>

   </head>
    <body>
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

     <script src="js/appR.js"></script>

   </body>
</html>
