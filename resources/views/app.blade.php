<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Athleteam </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" >
    <script src="https://kit.fontawesome.com/17fdd98214.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="js/script.js"></script>



</head>
<body>
<header>

</header>
</body>
<section>
<nav>
    <img src="../images/logo.png"  class="logostyle" >
    <a href="/"><i class="fas fa-home"></i>Accueil</a>
    <a href="/coach"><i class="fa-solid fa-dumbbell" style="color: #ffffff;"></i>Les Coachs </a>
    <a href="/profil"><i class="fa-solid fa-user" style="color: #ffffff;"></i>Profil</a>
    <a href="/createpost"><i class="fa-solid fa-plus" style="color: #ffffff;"></i>Nouveau Post</a>

    <div class="menu">

        <div class="submenu">
            <a href="#">Matchs</a>
            <div class="submenu-content">
                <a href="/matches/upcoming">Matchs à venir</a>
                <a href="/matches/past">Matchs passés</a>

                @if(auth()->check())
                    @php
                        $user = auth()->user();
                        $profile = $user->profile;
                    @endphp

                    @if($profile && $profile->role == 'admin' || $profile->role == 'coach')
                        <a href="/admin/create">Gérer les matchs</a>

                    @endif
                @endif

            </div>
        </div>
    </div>

    @auth
        <p class="pdisplay">Bonjour {{Auth::user()->name}}</p>
        <a href="#" onclick="document.getElementById('myform').submit()"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>Déconnexion</a>
        <form  id='myform' style="display:none" action="/logout" method="post">
            @csrf<input type="submit" value="logout"/>
        </form>
    @else

        <a href="/login">Se connecter</a>
        <a href="/register">S'inscire</a>
    @endauth
</nav>
<main>
    <div class="container">
        @yield('content')
    </div>
</main>
</section>

<nav class="phone">

    <a href="/"><i class="fas fa-home"></i></a>
    <a href="/coach"><i class="fa-solid fa-dumbbell" style="color: #ffffff;"></i> </a>
    <a href="/profil"><i class="fa-solid fa-user" style="color: #ffffff;"></i></a>
    <a href="/createpost"><i class="fa-solid fa-plus" style="color: #ffffff;"></i></a>

</nav>

</html>


