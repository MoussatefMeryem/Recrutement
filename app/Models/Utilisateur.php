<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commentaire;
use App\Models\Offer;
use App\Models\Notification;

class Utilisateur extends Model
{
    use HasFactory;
   

    protected $fillable=[
         'username',
         'email',
         'tel',
         'function',
         'password',
         'image',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class,'userId');
    }


}
