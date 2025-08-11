<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style/footmedia.css') }}">
    <title>@yield('title')</title>

    <style>
        /* --- Styles généraux --- */
        
    </style>
</head>
<body>
    @if (Auth::check())
        <section class="top-bar">
            <a href="{{ route('match.liste') }}">
                <img src="{{ asset('images/MediaFoot.jpg') }}" alt="logo" width="100px">
            </a>

            <div class="burger" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="right" id="menu">
                <a href="{{ route('but.liste') }}" class="btn btnblue">Liste des buts</a>
                <a href="{{ route('equipe.liste') }}" class="btn btnblue">Liste des équipes</a>
                <a class="btn btn-primary" href="{{ route('register') }}" role="button">Inscription</a>
            </div>
        </section>
    @else
        <section class="top-bar">
            <a href="{{ route('match.liste') }}">
                <img src="{{ asset('images/MediaFoot.jpg') }}" alt="logo" width="100px">
            </a>

            <div class="burger" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="right" id="menu">
                <a href="{{ route('but.liste') }}" class="btn btnblue">Liste des buts</a>
                <a href="{{ route('equipe.liste') }}" class="btn btnblue">Liste des équipes</a>
                <a class="btn btn-primary" href="{{ route('login') }}" role="button">Se connecter</a>
            </div>
        </section>
    @endif

    <section class="main mb-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('main')
    </section>

    <script>
        function toggleMenu() {
            document.getElementById('menu').classList.toggle('show');
        }
    </script>
</body>
</html>
