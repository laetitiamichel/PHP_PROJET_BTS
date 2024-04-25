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
                    {{-- ici code en blade donc @ devant if et foreach --}}
                    @if (Auth::user()->is_admin)
                        <ul>
                            @foreach( $users as $user)
                                <li>{{$user->name}}</li>
                            @endforeach
                        </ul>   
                    @else
                    <p>Bonjour, connectez-vous!</p> 
                    @endif
                    <img class="img" src="https://www.gravatar.com/avatar/0.jpg?s=200&d=retro">
                    {{-- si je veux modif le css du p=> création d'un fichier css dans app + rajout d'une class --}}
                        {{ __("You're logged in!") }}
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
