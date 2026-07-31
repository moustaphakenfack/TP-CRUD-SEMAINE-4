<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // Afficher inscription
    public function register()
    {
        return view('auth.register');
    }


    // Traitement inscription
    public function registerPost(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|confirmed|min:6'

        ]);


        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password)

        ]);


        // Connexion automatique après inscription
        Auth::login($user);


        return response()->json([

            'message' => 'Inscription réussie',

            'redirect' => '/products'

        ]);

    }



    // Afficher connexion
    public function login()
    {
        return view('auth.login');
    }



    // Traitement connexion
    public function loginPost(Request $request)
    {

        $request->validate([

            'email' => 'required|email',

            'password' => 'required'

        ]);



        if(Auth::attempt([

            'email' => $request->email,

            'password' => $request->password

        ])){


            $request->session()->regenerate();


            return response()->json([

                'message' => 'Connexion réussie',

                'redirect' => '/products'

            ]);

        }



        return response()->json([

            'message' => 'Email ou mot de passe incorrect'

        ],401);

    }




    // Dashboard
    public function dashboard()
    {
        return view('auth.dashboard');
    }




    // Déconnexion
    public function logout(Request $request)
    {

        Auth::logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();



        return redirect('/login');

    }

}