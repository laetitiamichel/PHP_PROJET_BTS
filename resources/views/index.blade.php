
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Maison des Ligues</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/css/reset.css">
        <link rel="stylesheet" href="/css/main.css">

        {{-- FAVICONE --}}
        <link  rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="manifest" href="/assets/favicon/site.webmanifest">
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
    <nav class="nav_bar">
        @if (Route::has('login'))
            <div class="menu_nav_bar">
                {{-- l'affichage si je suis loggué --}}
                @auth
                    <a href="{{ url('/dashboard') }}" class="menu_nav_bar_a">Membres</a>
                    <a href="{{ route('events.all_events') }}" class="menu_nav_bar_a">Evenements</a>
                @else      
                    <a href="{{ route('login') }}" class="menu_nav_bar_a">Connexion</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="menu_nav_bar_a">S'enregistrer</a>
                    @endif
                    
                @endauth
                    
            </div>       
        @endif
    </nav>
   {{--  <h2 class="h2_accueil" id="accueil">
        Prêt(e) à la compétition ? </br>Cliquez sur le bouton pour commencer
    </h2> --}}
    </div>
    <p class="p_accueil">
        Tous les mois profitez de toutes les nouveautés et opportunités.
    </br>A partir du mois prochain, on vous propose toutes les séances de sport sur vos supports préférés.
    </p>
    <div class="show_event_my">
    <ul class="display_grid_my">
        @foreach( $events as $event)
                <li class="img_accueil">
                    <h3 class="h3_events">{{$event->nom}}</h3>
                    <h3 class="h3_events_d">{{$event->description}}</h3>
                    {{-- storage=class qui gère les dossiers images puis va dans le dossier public
                        puis émet une url en fonction de l'image chargée--}}
                    <img class="photo_event_accueil" src="{{Storage::disk("public")->url($event->image)}}" alt="image de l'évènement"></img>
                </li>
            @endforeach
    </ul>
    </div>
    @auth
    @else
    <div class="bouton_inscription">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                {{-- l'affichage si je suis loggué --}}
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else      
                    <a class="clic_inscription" href="{{ route('login') }}" target="blank">Connectez-vous</a>
                    @if (Route::has('register'))
                    <a class="clic_inscription" href="{{ route('register') }}" target="blank">Cliquez pour vous inscrire</a>
                    @endif
                   {{--  <a href="{{ route('events.all_events') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Evenements</a> --}}
                @endauth
                    
            </div>       
        @endif
    </div>
    @endauth
</main>
<footer>
    <div class="img_logo">
        <img src="/assets/logo_jo.png" alt="logo jeux olympique">
    </div>
</footer>
        
    </body>
</html>
