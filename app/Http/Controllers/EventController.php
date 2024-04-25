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
        dd('index'); /* comme un echo en php */
    }

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

       /*  dd($request->all());
 */
       /* dd($request->all(), $request->nom,$request->description); */
        $nouvelEvent = new Event;
        $nouvelEvent->nom = $request->nom; /* ici on injecte l'info du formulaire dans la BDD */
        $nouvelEvent->description = $request->description;
        $nouvelEvent->image = null;
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
}
