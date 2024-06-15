<x-app-layout>
    <div class="ligne_rose"></div>
    <div class="ligne_verte"></div>
    <x-slot name="header">
      
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="page_ficheAdmin{{-- bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg --}}">
                <div class="ficheMembre{{-- p-6 text-gray-900 dark:text-gray-100 --}}">
                    <h2 class="h2_fiche">Fiche Membre: {{Auth::user()->prenom}}</h2>
                    @auth
                        @if (Auth::user()->is_admin)
                            <ul class="ul_fiche_membre">
                                @foreach( $users as $user)
                                    <li>Nom: {{$user->nom}}</li>
                                    <li>Prénom: {{$user->prenom}}</li>
                                    <li>Age: {{$user->age}}</li>
                                    <hr/>
                                @endforeach
                            </ul> 
                        
                        @else
                                <ul>
                                        <li>Nom: {{$me->nom}}</li>
                                        <li>Prénom: {{$me->prenom}}</li>
                                        <li>Age: {{$me->age}}</li>
                                </ul> 

                        {{-- <p class="connection">Bonjour, connectez-vous!</p>  --}}
                        @endif
                    @endauth
                   {{--  <div class="photo_membre">
                        <img src="{{Storage::disk("public")->url($me->cover)}}" alt="photo du membre"></img>
                    <img class="img" src="https://www.gravatar.com/avatar/0.jpg?s=200&d=retro">
                    {{-- si je veux modif le css du p=> création d'un fichier css dans app + rajout d'une class
                    </div> --}}
                    {{ __("vous êtes connecté!") }}
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
