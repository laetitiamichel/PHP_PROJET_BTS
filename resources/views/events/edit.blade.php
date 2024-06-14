{{-- blade template / layout using template inter.. pour pouvoir injecter ce composant dans la page app
    et donc dans app=> @yeld et ici plus de x-slot --}}
{{-- quand balise commence par x = composant --}}
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
                    <h1 class="h2_accueil">Modifier un évènement</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('events.update',$event)}}" method="POST" enctype="multipart/form-data" class="creer_event">
                       @csrf {{-- pour protéger le formulaire d'injection de code --}}
                       {{-- enctype="multipart/form-data" = à mettre absolument quand on met une image opur qu'elle s'affiche --}}
                        @method('patch')
                                <label for="titre">Titre:</label>
                                <input type="text" name="nom" value="{{old('nom', $event->nom)}}">
                                <label for="description">Description:</label>
                                <input type="text" name="description" value="{{old('description', $event->description)}}">
                                <label class="" for="cover">Photo de l'évènement:</label>
                                <input type="file" name="cover" value="{{old('image', $event->image)}}">
                                <button class="validation" type="submit">Valider</button>
                        {{-- {{ __('store') }} --}}
                    </from>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
