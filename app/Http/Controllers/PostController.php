<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Utilisateur;
use App\Models\Notification;

class PostController extends Controller
{
    public function post(){
        $offers = Offer::with('utilisateur')->get();

        return view('user.userpage',compact('offers'));
    }

    public function offerDetail(Request $request){
        $userId = $request->session()->get('loginId');

        // Récupérer les offres qui ont l'id utilisateur est $userId
        $client = Utilisateur::find($userId);
        $id = $request->input('idR');
        $idO = $request->input('idO');
        $offers = Offer::find($idO);
        $utilisateur = Utilisateur::find($id);
        $notifications = Notification::with(['utilisateur'])->get();
        $userId = $request->session()->get('loginId');
        $unreadNotificationCount = Notification::where('userId', $userId)
        ->where('is_read', false)
        ->count();
        return view('user.offerDetail', compact('utilisateur', 'client', 'notifications', 'offers','unreadNotificationCount'));
    }
}
