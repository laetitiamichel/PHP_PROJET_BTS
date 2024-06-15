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
                        <ul class="display_grid">     
                                @foreach( $events as $event)
                                        <li class="img_accueil"> 
                                            <h3 class="h3_events">{{$event->nom}}</h3>
                                            <h3 class="h3_events_d">{{$event->description}}</h3>
                                        
                                        {{-- storage=class qui gère les dossiers images puis va dans le dossier public
                                            puis émet une url en fonction de l'image chargée--}} 
                                            <img class="photo_event_accueil" src="{{Storage::disk("public")->url($event->image)}}" alt="image de l'évènement"></img>
                                        
                                            @if (Auth::user()->is_admin)
                                            <div class="bouton_admin">
                                                <a class="clic_modif" href="{{ route('events.edit',$event) }}" target="blank">Modifier</a>
                                                <form action="{{ route('events.destroy',$event) }}" 
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                        <button class="clic_modif" type="submit">Supprimer</button>
                                                </from>
                                            </div>
                                            @endif
                                        </li>   
                                @endforeach
                        </ul>
                            {{-- @endif --}}
                        
                        {{-- <x-primary-button class="mt-4">{{ __('events') }}</x-primary-button> --}}
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>