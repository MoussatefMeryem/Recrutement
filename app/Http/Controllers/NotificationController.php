<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notification = Auth::utilisateur()->notifications()->find($id);

        if ($notification) {
            $notification->delete();
        }

        return redirect()->back();
    }

    public function showNotifications()
    {
        $notifications = auth()->user()->notifications;
        return view('notifications', compact('notifications'));
    }
}
