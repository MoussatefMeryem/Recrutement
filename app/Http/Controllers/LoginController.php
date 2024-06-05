<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Notification;
use App\Models\Offer;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function create(){
        return view('authentification.login');
    }

    public function store(Request $request){

          $formFields = $request->validate([
             'username' =>'required',
             'email' => 'required|email',
             'tel' =>'required',
             'function' =>'required',
             'password' =>'required|confirmed',
             'image' =>'required|image|mimes:jpg,jpeg,svg,png',
           ]);
           $password = $request->password;
           $formFields['password'] = Hash::make($password);
           $formFields['image'] = $request->file('image')->store('profile','public');
           Utilisateur::create($formFields);

         return redirect()->route('create')->with('success','hola');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $offers = Offer::with(['utilisateur', 'commentaires'])->get();
        $client = Utilisateur::where('email', $request->email)->first();

        if ($client && Hash::check($request->password, $client->password)) {
            $request->session()->put('loginId', $client->id);

            $offersCount = Offer::count();

        // Passer le nombre des offres à la vue


            // Récupérer les notifications non lues de l'utilisateur
            $notifications = Notification::where('userId', $client->id)->get();
            $unreadNotificationCount = $notifications->where('is_read', false)->count();

            // Vérification du rôle
            if ($client->function === "1") {
                // Utilisateur est un administrateur
                return view('rh.dashboard',compact('client'));
            } else {
                return view('user.userpage', compact('offers', 'client', 'notifications', 'unreadNotificationCount', 'offersCount'));
            }
        } else {
            return back()->with('fail', 'Invalid identifications.');
        }

    }


     public function dashboard(){
            return view('rh.dashboard');
     }

    public function userpage(){
        return view('user.userpage');
    }

    public function logout(Request $request){
        Auth::logout(); // Déconnexion de l'utilisateur
        $request->session()->invalidate(); // Invalidaion de la session
        $request->session()->regenerateToken(); // Régénère le jeton de session

        return redirect('/');
    }

}
