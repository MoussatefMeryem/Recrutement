<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Utilisateur;

class ApplicationController extends Controller
{
    public function displayApplication(Request $request){
        $userId = $request->session()->get('loginId');
        $client = Utilisateur::find($userId);
    // Récupérer les offres qui ont l'id utilisateur est $userId
    $offers = Offer::with('utilisateur','categorie')->where('userId', $userId)->get();

    // Passer les offres à la vue
    return view('rh.display_application', compact('offers','client'));

    }

    public function displayApplication2(){
        $userId = $request->session()->get('loginId');
        $client = Utilisateur::find($userId);
        return view('rh.display_application2',compact('client'));
    }
}
