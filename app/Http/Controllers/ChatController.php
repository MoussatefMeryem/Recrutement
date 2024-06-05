<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        return view('chat.index');
    }

    public function store(Request $request){
        event(new ChatMessageEvent($request->nickname,$request->message));
        return response()->json([
            'success' => 'Chat message sent.'
        ]);
    }
}
