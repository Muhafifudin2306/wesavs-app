<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Grup;
use App\Models\Message;
use App\Models\Point;
use App\Models\UserHasGrup;
use App\Models\UserHasPoint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GrupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $grups = Grup::latest()->get();
        $userId = Auth::user()->id;
        $userHasGrup = UserHasGrup::where('id_user', $userId)->get();
        return view('grup.read', compact('grups','userHasGrup'));
    }

    public function userIndex()
    {
        $grups = Grup::latest()->get();
        $userId = Auth::user()->id;
        $userHasGrup = UserHasGrup::where('id_user', $userId)->get();
        return view('grup.user.read', compact('grups','userHasGrup'));
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
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'provinsi' => $request->provinsi,
            'negara' => $request->negara,
            'image' => $imagePath,
            'status' => 'open'
        ]);

        return response()->json(['message' => 'Store Data Berhasil!'], 201);
    }

    public function indexChat($slug)
    {
        $grup = Grup::where('slug', $slug)->first();
        $messages = Message::where('grup_id', $grup->id)->get();
        $chatPoint = Point::where('id', 1)->first();
        return view('grup.chat.read', compact('messages', 'grup', 'chatPoint'));
    }

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'message' => $request->input('message'),
            'user_id' => $request->input('sender'),
            'grup_id' => $request->input('grup')
        ]);

        event(new MessageSent($message));

        $today = Carbon::now()->toDateString();
        $currentUser = Auth::user();
        $chatPoint = Point::where('id', 1)->first();
        $userHasPoint = UserHasPoint::where('id_user', Auth::user()->id)
                                    ->where('last_chat', $today)
                                    ->first();

        $newPointAdded = false;
        if (!$userHasPoint) {
            $expiryDate = Carbon::now()->endOfYear();

            UserHasPoint::create([
                'id_user' => $currentUser->id,
                'point' => $chatPoint->point,
                'last_chat' => $today,
                'expire_date' => $expiryDate
            ]);
            $newPointAdded = true;
        }

        return response()->json(['message' => $message, 'point' => $newPointAdded]);
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
            'slug' => Str::slug($request->name),
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

    public function joinGrup(Request $request, $id){
        UserHasGrup::create([
            'id_user' => Auth::user()->id, 
            'id_grup' => $id
        ]);
        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }

    public function leaveGrup($id)
    {
        $userId = Auth::user()->id;
        $grup = UserHasGrup::where('id_user', $userId)->where('id_grup', $id)->first();

        $grup->delete();

        return response()->json(['success' => 'Delete Grup Successfully']);
    }
}
