<?php

namespace App\Http\Controllers;

use App\Models\Psikiater;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ConsultationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('psikiater.read');
    }

    public function indexSettingPsikiater(){
        $psikiater = Psikiater::latest()->get();
        return view('setting.psikiater.read', compact('psikiater'));
    }

    public function storePsikiater(Request $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('psikiater', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $userRole = Role::where('name', 'psikiater')->first();
        $user->assignRole($userRole);

        Psikiater::create([
            'name' => $request->name,
            'description' => $request->description,
            'buka' => $request->buka,
            'tutup' => $request->tutup,
            'image' => $imagePath,
            'entry' => $request->entry,
            'id_user' => $user->id, 
        ]);
        return response()->json(['message' => 'Store Data Berhasil!'], 201);
    }

    public function destroyPsikiater($id)
    {
        $psikiater = Psikiater::find($id);
        $user = User::find($psikiater->id_user);
        $user->delete();
        $psikiater->delete();

        return response()->json(['success' => 'Delete Psikiater Successfully']);
    }

    public function updatePsikiater(Request $request, $id)
    {
        $psikiater = psikiater::find($id);

        $psikiater->update([
            'name' => $request->name,
            'description' => $request->description,
            'entry' => $request->entry,
            'buka' => $request->buka,
            'tutup' => $request->tutup
        ]);
        $coverPath = null;
        if ($request->hasFile('image')) {
            $coverPath = $request->file('image')->store('psikiater', 'public');
            $psikiater->update([
                'image' => $coverPath,
            ]);
        };
        $user = User::find($psikiater->id_user);

        $user->update([
            'email' => $request->email
        ]);
        return response()->json(['message' => 'Update Data Berhasil!'], 201);
    }
}
