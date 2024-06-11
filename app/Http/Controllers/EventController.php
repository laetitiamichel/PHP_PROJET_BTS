<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        return view('events.store'); /* comme un echo en php */
    } 
    
    public function all_events()
    {
        if (Auth::check()) {
            // Utilisateur connecté, récupérer les événements qu'il a créés
            $meEvent = Event::where('user_id', Auth::id())->orWhere('public', true)->get();
        } else {
            // Utilisateur non connecté, récupérer les événements publics
            $events = Event::where('public', true)->get();
        }

        return view('events.all_events');
    } 
         /* comme un echo en php */
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create'); /* ici on récupère la vue du dossier event */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required|string',
            'description'=>'required|string',
            'email'=>'required|email',
            'cover'=>'required|image',
        ]);
        /* $event = Event::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'email' => $request->email,
            'cover' => $request->cover,
        ]); */
      /*  dd($request->all()); */
 
       /* dd($request->all(), $request->nom,$request->description); */
        $nouvelEvent = new Event;
        $nouvelEvent->nom = $request->nom; /* ici on injecte l'info du formulaire dans la BDD */
        $nouvelEvent->description = $request->description;
       /*  stock l'image dans le dossier public/images */
        $nouvelEvent->image = $request->cover->store('images', 'public');
        /* méthode save de la class model */
        $nouvelEvent->save();

        return view('events.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    /* public function index(): View
    {
        return view('events.index');
        return view('events.index', [
            'events' => all_events::with('user')->latest()->get(),
        ]);
    } */

    /* public function index()
    {
        // Logique pour récupérer et afficher les événements
        return view('events.all_events'); // Assurez-vous d'avoir une vue `events/index.blade.php`
    } */
}
