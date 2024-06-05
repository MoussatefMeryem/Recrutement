<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categori;
use App\Models\Offer;
use App\Models\Utilisateur;

class OfferController extends Controller
{
    public function addOffer(Request $request){
        $categories = Categori::All();
        $userId = $request->session()->get('loginId');
        $client = Utilisateur::find($userId);
        return view('rh.add_offer',compact('categories','client'));
    }



    public function insertOffer(Request $request){

        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'dscr' => 'required|string',
            'datel' => 'required|date',
            'cat' => 'required|exists:categoris,id',
        ]);

        $userId = $request->session()->get('loginId');
        // Insérer l'offre
        $offer = new Offer();
        $offer->titre = $request->input('titre');
        $offer->desc = $request->input('dscr');
        $offer->date = $request->input('datel');
        $offer->userId = $userId;
        $offer->catId = $request->input('cat');
        $offer->save();

        // Rediriger ou retourner une réponse
        return redirect()->route('display_offer')->with('success', 'Offre créée avec succès.');
    }

    public function display_offer(Request $request){
        $userId = $request->session()->get('loginId');
        $client = Utilisateur::find($userId);
        $offers = Offer::with('categorie')->get();
        return view('rh.display_offer',compact('offers','client'));
    }

    public function modO(Request $request){
        $userId = $request->session()->get('loginId');
        $client = Utilisateur::find($userId);
        $id = $request->input('offer_id');
        $offer = Offer::find($id);
        $categories = Categori::all();

        if (!$offer) {
            return redirect()->route('rh.display_offer')->with('fail', 'Offer not found.');
        }

        return view('rh.modO', compact('offer', 'categories','client'));

    }

    public function updateOffer(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'dscr' => 'required|string',
            'datel' => 'required|date',
            'cat' => 'required|exists:categoris,id',
        ]);
        $userId = $request->session()->get('loginId');
        $id = $request->input('offer_id');
        $offer = Offer::find($id);

        if (!$offer) {
            return redirect()->route('display_offer')->with('fail', 'Offer not found.');
        }

        $offer->titre = $request->input('titre');
        $offer->desc = $request->input('dscr');
        $offer->date = $request->input('datel');
        $offer->userId = $userId;
        $offer->catId = $request->input('cat');
        $offer->save();

        return redirect()->route('display_offer')->with('success', 'Offer updated successfully.');
    }

    public function deleteO(Request $request){
        $userId = $request->session()->get('loginId');
        $client = Utilisateur::find($userId);
        $request->validate([
            'offer_id' => 'required|exists:offers,id',
        ]);

        $offer = Offer::findOrFail($request->offer_id);
        $offer->delete();
        $offers = Offer::with('categorie')->get();
        return view('rh.display_offer',compact('client','offers'));
    }
}
