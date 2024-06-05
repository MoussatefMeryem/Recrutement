<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Offer;
use App\Models\Commentaire;
use App\Models\Notification;
use App\Models\Utilisateur;

class CommentaireController extends Controller
{
    public function addCommentaire(Request $request){
        $request->validate([
            'commentaire' => 'required|string|max:255',

            'idO' => 'required|integer|exists:offers,id',
        ]);
        $userId = $request->session()->get('loginId');
        // Création du nouveau commentaire
        $comment = new Commentaire();
        $comment->contenu = $request->input('commentaire');
        $comment->offId = $request->input('idO');
        $comment->userId = $userId;
        $comment->save();
        $offersCount = Offer::count();
        $userId = $request->session()->get('loginId');
        $client = Utilisateur::find($userId);

            $notifications = Notification::where('userId', $userId)->get();
            $unreadNotificationCount = $notifications->where('is_read', false)->count();
            $offers = Offer::with(['utilisateur', 'commentaires'])->get();
        // Redirection avec message de succès
        return view('user.userpage',compact('unreadNotificationCount','notifications','offers','client','offersCount'));
    }

    public function userPage(){
        $offers = Offer::with(['utilisateur', 'commentaires'])->get();

        // Passer les offres et les commentaires à la vue
        return view('user.userpage', compact('offers'));
    }
}
