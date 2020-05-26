<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LaraQuotes</title>

    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">LaraQuotes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if (Route::has('login'))
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    @auth
                    <a class="nav-item nav-link" href="{{ url('/quotes') }}">Quotes</a>
                    @else
                    <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                    <a class="nav-item nav-link " href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
                </div>
            </div>
            @endif
        </div>
    </nav>

    <!-- Akhir Navbar -->

    <div class="content">
        <div class="jumbotron jumbotron-fluid" style="background-image :url({{url('image/image_home.jpg')}}); ">
            <div class="container">
                <h3 class="display-4">Hambatan terbesar untuk sukses adalah rasa takut akan
                    <br><span>Kegagalan</span></h3>
                <a href="{{url("quotes/random")}}" class="btn btn-primary">Random Kutipan</a>
            </div>
        </div>
    </div>
</body>

</html>
