<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reports</title>

   </head>
    <body>
     <h1>Admins</h1>
     @foreach($admins as $admin)
        <p>
            <a href="/user/{{$admin->user->id}}">
                {{$admin->user->name}}
            </a>
             - rank {{$admin->rank}} - set new rank
        </p>
     @endforeach
     <script src="js/appR.js"></script>
   </body>
</html>
