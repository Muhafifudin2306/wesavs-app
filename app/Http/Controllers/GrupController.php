<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Grup;
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
        $grups = Grup::latest()->get();
        return view('grup.read', compact('grups'));
    }

    public function settingGrup()
    {
        $grups = Grup::latest()->get();
        return view('setting.grup.read', compact('grups'));
    }

    public function storeGrup(Request $request)
    {

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        gRUP::create([
            'name' => $request->name,
            'description' => $request->description,
            'provinsi' => $request->provinsi,
            'negara' => $request->negara,
            'image' => $imagePath,
            'status' => 'open'
        ]);

        return response()->json(['message' => 'Store Data Berhasil!'], 201);
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

    public function destroyGrup($id)
    {
        $grup = Grup::find($id);

        $grup->delete();

        return response()->json(['success' => 'Delete Grup Successfully']);
    }

    public function updateGrup(Request $request, $id)
    {
        $grup = Grup::find($id);

        $grup->update([
            'name' => $request->name,
            'description' => $request->description,
            'provinsi' => $request->provinsi,
            'negara' => $request->negara
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');

            $grup->update([
                'image' => $imagePath,
            ]);
        };
        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }
}
