<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reports</title>

   </head>
    <body>
     <h1>Rapoarte</h1>
     @foreach($reports as $report)
        <p>{{$report->reason}}</p>
     @endforeach
     <script src="js/appR.js"></script>
   </body>
</html>
