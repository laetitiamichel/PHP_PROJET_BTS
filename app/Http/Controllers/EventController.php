<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        return view('events.all_events');
        /* return view('events.store'); */ /* comme un echo en php */
    } 
    
   public function all_events()
    {
        
        if(auth()->user()->is_admin){
           /*  pour afficher tous les events si admin */
            $events = Event::all();
        }
        else{
             //appel à la relation one to many de event=> foreign key user_id de id table users
            $events= auth()->user()->events;
        }
      
        //dd($events); 
        return view('events.all_events',[
            'events' => $events,
        ]);


        // Récupérer l'utilisateur connecté
        /* $user = Auth::user(); */

        // Récupérer les événements créés par l'utilisateur connecté
        /* $events = $user->events; */
       /*  return view('events.all_events'/* , compact('events') ); */
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
            'user_id'=>'int',
        ]);

             /* dd($request->all(), $request->nom,$request->description); */
             $nouvelEvent = new Event;
             $nouvelEvent->nom = $request->nom; /* ici on injecte l'info du formulaire dans la BDD */
             $nouvelEvent->description = $request->description;
            /*  stock l'image dans le dossier public/images */
             $nouvelEvent->image = $request->cover->store('images', 'public');
             /* méthode save de la class model */
             $nouvelEvent->user_id = Auth::id();
             $nouvelEvent->save();
             return view('events.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //return view('event.show',['event'=>$event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit',["event"=>$event]); /* ici on récupère la vue du dossier event */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        /* dd($request->all()); */
        $request->validate([
            'nom'=>'required|string',
            'description'=>'required|string',
            'cover'=>'image',
        ]);

             /* dd($request->all(), $request->nom,$request->description); */
            $event->nom = $request->nom; /* ici on injecte l'info du formulaire dans la BDD */
            $event->description = $request->description;
            /*  vérif si image est uploade */
            if ($request->hasfile('cover')){
                $event->image = $request->cover->store('images', 'public');
            }   
             /* méthode save de la class model */
            $event->save();

            return redirect()->route('events.all_events');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.all_events');
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
