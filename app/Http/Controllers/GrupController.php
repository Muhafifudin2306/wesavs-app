<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;

class GrupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('grup.read');
    }

    public function indexChat()
    {
        $messages = Message::all();
        return view('grup.chat.read', compact('messages'));
    }

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'message' => $request->input('message'),
            'user_id' => $request->input('sender')
        ]);

        event(new MessageSent($message));

        return response()->json(['message' => $message]);
    }
}
