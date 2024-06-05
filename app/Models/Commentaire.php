<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utilisateur;
use App\Models\Offer;


class Commentaire extends Model
{
    use HasFactory;
    protected $table = 'commentaires';
    protected $fillable=[

        'contenu',
        'dateS',
        'userId',
        'offId',
        
   ];

   
   public function offer()
   {
       return $this->belongsTo(Offer::class, 'offId');
   }

   public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'userId');
    }

}
