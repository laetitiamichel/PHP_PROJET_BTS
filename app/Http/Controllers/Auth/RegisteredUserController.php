<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    /* pour afficher la fiche membre dans la vue dashbord*/
    public function submit(Request $request)
    {
         // Valider les données reçues
         $validatedData = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'date_naissance' => ['required', 'date'], // Ajout de la validation de la date de naissance
            'age' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
        ]);

        // Passer les données à la vue
        return view('result', ['data' => $validatedData]);
        $data = $request->all();
        return view('dashboard', compact('data'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'date_naissance'=>['required', 'date', /* 'before:' . Carbon::now()->subYears(18)->format('Y-m-d')], */
          function ($attribute, $value, $fail) {
                $age = Carbon::parse($value)->age;
                if ($age < 18) {
                    $fail('Vous devez avoir plus de 18 ans pour vous inscrire.');
                }
            }],
            'age' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            /* 'photo'=>'required|image', */
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'age' => $request->age,
            'ville' => $request->ville,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            /* 'photo' => $request->photo, */
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
