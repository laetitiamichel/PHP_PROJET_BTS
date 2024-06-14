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
                    <h1 class="h1_all_events">Afficher Mes évènements</h1>
                    <div class="show_event">
                        @auth
                           {{--  @if($events->isEmpty())
                                <p>No events found.</p>
                            @else --}}
                        <ul>     
                                @foreach( $events as $event)
                                        <li class="all_events_list"> Nom: {{$event->nom}}</li>
                                        <li class="all_events_description"> Description: {{$event->description}}</li>
                                        {{-- storage=class qui gère les dossiers images puis va dans le dossier public
                                            puis émet une url en fonction de l'image chargée--}} 
                                        <img class="photo_event_all" src="{{Storage::disk("public")->url($event->image)}}" alt="image de l'évènement"></img>
                                @endforeach
                            {{-- @endif --}}
                        </ul>
                        {{-- <x-primary-button class="mt-4">{{ __('events') }}</x-primary-button> --}}
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>