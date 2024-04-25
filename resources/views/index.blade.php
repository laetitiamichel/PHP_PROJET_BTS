
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <link rel="stylesheet" href="./public/css/main.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
    </head>
<body class="antialiased">
    <div class="ligne_rose"></div>
    <div class="ligne_verte"></div>
<header class="page_accueil" id="accueil">
    <h1 class="h1_accueil">
        Maison des ligues tous les sports 
    </h1>
</header>
<main class="main_accueil">
    <h2 class="h2_accueil" id="accueil">
        Prêt(e) à la compétition ? </br>Cliquez sur le bouton pour commencer
    </h2>
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                {{-- l'affichage si je suis loggué --}}
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else      
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Connexion</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">S'enregistrer</a>
                    @endif
                @endauth
                    <a href="{{ route('events.create') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Evenements</a>
            </div>       
        @endif
    </div>
    <div class="show_events">
        <ul>
            @foreach( $events as $event)
                <li>
                    <div>{{$event->name}}</div>
                    <div>{{$event->description}}</div>
                   {{--  <div>{{$event->image}}</div> --}}
                </li>
            @endforeach
        </ul>
    </div>
    <p class="p_accueil">
        Tous les mois profitez de toutes les nouveautés et opportunités.
    </br>A partir du mois prochain, on vous propose toutes les séances de sport sur vos supports préférés.
    </p>
    <ul class="display_grid">
        <li class="img_accueil">
            <img src="./asset/athle.jpg" alt="ligue angers">
            <h3>content</h3>
        </li>
        <li class="img_accueil">
            <img src="./asset/athle.jpg" alt="ligue fc nantes">
            <h3>content</h3>
        </li>
        <li class="img_accueil">
            <img src="./asset/athle.jpg" alt="ligue montpellier">
            <h3>content</h3>
        </li>
        <li class="img_accueil">
            <img src="./asset/athle.jpg" alt="ligue losc">
            <h3>content</h3>
        </li>
        <li class="img_accueil">
            <img src="./asset/athle.jpg" alt="ligue paris">
            <h3>content</h3>
        </li>
        <li class="img_accueil">
            <img src="./asset/athle.jpg" alt="ligue reims">
            <h3>content</h3>
        </li>
        <li class="img_accueil">
            <img src="./asset/athle.jpg" alt="ligue saint etienne">
            <h3>content</h3>
        </li>
        <li class="img_accueil">
            <img src="./asset/athle.jpg" alt="ligue bordeaux">
            <h3>content</h3>
        </li>
        <li class="img_accueil">
            <img src="./asset/athle.jpg" alt="ligue marseille">
            <h3>content</h3>
        </li>
        <li class="img_accueil">
            <img src="./asset/athle.jpg" alt="ligue lyon">
            <h3>content</h3>
        </li>
    </ul>
    <div class="bouton_inscription">
        <a class="clic_inscription" href="./formulaire_inscription.html" target="blank">Cliquez pour vous inscrire</a>
        <a class="clic_inscription" href="./connexionMembre.html" target="blank">Connectez-vous</a>
    </div>
</main>
<footer>
    <div class="img_logo">
        <img src="./asset/logo_jo.png" alt="logo jeux olympique">
    </div>
</footer>
        
    </body>
</html>
