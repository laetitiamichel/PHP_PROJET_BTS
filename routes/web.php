<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/* dans les () => arguments de get de la route welcome => chemin + fonction */
Route::get('/', function () {
    $events= App\Models\Event :: all();
    return view('index',[
        'events' => $events,
    ]);
})->name('accueil');

/* Route::get('/dasboard', function () {
    $events= App\Models\Event :: all();
    return view('events',[
        'events' => $events,
        'meEvent' => auth()->user(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');; */

Route::get('/dasboard', function () {
   $events= App\Models\Event :: all();
    return view('dashboard',[
        'events' => $events,
        'meEvent' => auth()->user(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/events/all', [EventController::class, 'allEvents'])->name('events.all_events');




Route::get('/dashboard', function () {
    $users = App\Models\User :: all();/* :: pour accéder à une méthode <statique>
      ici pour afficher tous les users sur la page d'accueil */
    /* dd($users);  *//* =dead and dump = dd pour vérif que j'ai tout les users */    
    return view('dashboard', [
        'users' => $users,
        'me' => auth()->user(),      
    ]); /* accueil site */
})->middleware(['auth', 'verified'])->name('dashboard'); /* authentification user */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/* création de la route car création de la table event */
Route::resource('events', \App\Http\Controllers\EventController::class);
Route::resource('user', \App\Http\Controllers\ProfileController::class);

/* Route::resource('events', ChirpController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']); */


