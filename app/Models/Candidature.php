<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utilisateur;
use App\Models\Offer;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable = ['userId', 'offerId', 'CV', 'dateS', 'status'];

    public function user()
    {
        return $this->belongsTo(Utilisateur::class, 'userId');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offerId');
    }
}
