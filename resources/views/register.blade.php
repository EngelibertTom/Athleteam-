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
        <div class="inscription">
            <div class="lottie">
                <h2> En cours d'inscription... </h2>
                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_lz5rbiit.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>

            </div>
            <form method="post" action="/register">
                @csrf
                <h1>Inscription</h1>
                <input type="text" name="name" required placeholder="Nom d'utilisateur"/> <br/>
                <input type="email" name="email"required placeholder="E-mail"/><br>
                <input type="password" name="password" required placeholder="Mot de passe" /><br>
                <input type="password" name="password_confirmation" required placeholder="Confirmation du mot de passe" /><br/>
                <input type="submit" value="S'inscrire"/><br/>
                <a href="/login"> <span>Déjà inscrit ?</span></a>
            </form>
        </div>
    </div>
</div>
</body>
<html>



