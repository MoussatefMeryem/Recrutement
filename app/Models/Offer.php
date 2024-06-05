<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categori;
use App\Models\Utilisateur;
use App\Models\Commentaire;


class Offer extends Model
{
    use HasFactory;
    protected $fillable=[

        'titre',
        'desc',
        'date',
        'userId',
        'catId',
   ];

   public function categorie()
    {
        return $this->belongsTo(Categori::class, 'catId');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'userId');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'offId');
    }

    public function applications()
    {
        return $this->hasMany(Candidature::class, 'offerId');
    }
}
