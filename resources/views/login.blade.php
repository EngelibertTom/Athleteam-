<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> My first laravel </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</head>

<body>
<header>

</header>
<body>
<div class="container1">
    <div class="gauche">
        <img src="images/logo.png">


    </div>
    <div class="droite">
        <div class="banner">
            <h1>Bienvenue sur <strong>Athleteam </strong>!</h1>
        </div>
        <div class="connexion">
            <div class="lottie">
            <h2> On s'échauffe... </h2>
                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_aaleelx7.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>

            </div>

<form method="post" action="/login">
    @csrf
    <h1>Connexion</h1>
    <input type="email" name="email"required placeholder="Votre e-mail"/> <br>
    <input type="password" name="password" required placeholder="Votre mot de passe"/><br>
    Se souvenir de toi ? <input type="checkbox" name="remember" /><br>
    <input type="submit" value="Se connecter"/><br/>
    <span>Pas encore de compte ? </span><a href="/register">S'inscire'</a>
</form>
        </div>
    </div>
</div>
</body>
<html>



