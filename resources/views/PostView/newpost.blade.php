<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reports</title>

   </head>
    <body>
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
     <script src="js/appR.js"></script>
   </body>
</html>
