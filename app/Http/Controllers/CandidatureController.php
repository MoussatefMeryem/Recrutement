<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidature;
use App\Models\Offer;
use App\Models\Notification;
use App\Models\Utilisateur;
use App\Notifications\CandidatureAccepted;

class CandidatureController extends Controller
{
    public function saveCandidature(Request $request){
        $request->validate([
            'cvUpload' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $offersCount = Offer::count();

        // Récupérer l'utilisateur actuel
        $userId = $request->session()->get('loginId');
        $offerId = $request->input('idO');

          $client = Utilisateur::find($userId);


            $notifications = Notification::where('userId', $userId)->get();
            $unreadNotificationCount = $notifications->where('is_read', false)->count();
        // Récupérer le fichier téléchargé
        if ($request->hasFile('cvUpload')) {
            $file = $request->file('cvUpload');
            $filePath = $file->store('cvs', 'public');
        }

        // Enregistrer les données dans la table 'candidature'
        Candidature::create([
            'userId' => $userId,
            'offerId' => $offerId,
            'CV' => $filePath,
            'dateS' => now(),
            'status' => 'submitted',
        ]);

        $offers = Offer::with('utilisateur')->get();

        return view('user.userpage',compact('notifications','offers','offersCount','client','unreadNotificationCount'));

    }

    public function displayCandidature(Request $request){
        $offerId = $request->input('idO');
        $offer = Offer::with(['applications.user', 'utilisateur', 'categorie'])->findOrFail($offerId);
        $applications = $offer->applications;
        $userId = $request->session()->get('loginId');
        $client = Utilisateur::find($userId);
        return view('rh.display_application2', compact('offer', 'applications', 'client'));
    }

    public function detailCandidature(Request $request){
        $idC = $request->input('candId');

        // Rechercher la candidature avec les informations de l'utilisateur
        $candidature = Candidature::with('user')->find($idC);

        // Vérifier si la candidature existe
        if (!$candidature) {
            return redirect()->back()->with('error', 'Candidature non trouvée.');
        }

        // Retourner une vue avec les informations de la candidature et de l'utilisateur
        return view('rh.candidaturedetail', compact('candidature'));

    }

    public function accepterCandidature(Request $request){

        $id = $request->input('idC');
        $candidature = Candidature::find($id);
        if (!$candidature) {
            return view('rh.dashboard');
        }

        $candidature->status = 'accepted';
        $candidature->save();

        $user = $candidature->user;
        Notification::create([
            'userId' => $user->id,
            'contenu' => 'Votre candidature pour le poste de ' . $candidature->offer->titre . ' a été acceptée.',
            'dateN' => now(),
        ]);
        $userId = $request->session()->get('loginId');
        $client = Utilisateur::find($userId);
        return view('rh.dashboard',compact('client'));
    }
}
