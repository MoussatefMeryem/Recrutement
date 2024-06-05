<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'dateN',
        'userId',
        'is_read'
    ];

    // Ajoutez les relations nécessaires
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'userId');
    }

    public function markAsRead(Request $request)
{
    $notification = Notification::find($request->notification_id);
    $notification->is_read = true;
    $notification->save();

    return back();
}

}
