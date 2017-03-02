<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>4gag</title>

        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body>


        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  <a class="navbar-brand" href="#">4gag</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class='nav navbar-nav'>
                        <li><a href="/hot">Hot<span class="sr-only">(current)</span></a></li>
                        <li><a href="/fresh">Fresh</a></li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class='nav navbar-nav'>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/category/tempore">Tempore</a></li>
                            <li><a href="/category/eos">Eos</a></li>
                            <li><a href="/category/aliquam">Aliquam</a></li>
                            <li><a href="/category/laboriosam">Laboriosam</a></li>
                            <li><a href="/category/quo">Quo</a></li>
                            <li><a href="/category/culpa">Culpa</a></li>
                            <li><a href="/category/fuga">Fuga</a></li>
                            <li><a href="/category/est">Est</a></li>
                        </ul>
                        </li>
                    </ul>
                    <ul class='nav navbar-nav navbar-right'>
                        <li><a href="/newpost">New Post</a></li>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>


        <script src="/js/app.js"></script>

    </body>
</html>
