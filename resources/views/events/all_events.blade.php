<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Afficher les évènements</h1>
                    <div class="show_event">
                        @auth
                        <ul>
                            @foreach( $events as $event)
                                <li class="img_accueil">
                                    <li>Nom: {{$event->nom}}</li>
                                    <li>Description: {{$event->description}}</li>
                    
                                    {{-- storage=class qui gère les dossiers images puis va dans le dossier public
                                        puis émet une url en fonction de l'image chargée--}}
                                    <img src="{{Storage::disk("public")->url($event->image)}}" alt="image de l'évènement"></img>
                                </li>
                            @endforeach
                        </ul>
                        {{-- <x-primary-button class="mt-4">{{ __('events') }}</x-primary-button> --}}
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>