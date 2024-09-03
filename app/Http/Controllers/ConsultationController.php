<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Psikiater;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $today = Carbon::today()->format('Y-m-d');

        $psikiater = Psikiater::withCount(['consultations' => function ($query) use ($today) {
            $query->whereDate('date', $today);
        }])->get();
        return view('psikiater.read', compact('psikiater'));
    }

    public function indexUserConsul()
    {
        $consultation = Consultation::where('id_user', Auth::user()->id)->get();
        return view('consultation.user.read', compact('consultation'));
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

    public function storeOrder(Request $request)
    {
        Consultation::create([
            'id_user' => Auth::user()->id,
            'number' => $request->number,
            'problem' => $request->problem,
            'status' => 'Pending',
            'date' => $request->date,
            'id_psikiater' => $request->id_psikiater
        ]);

        return response()->json(['success' => 'Order Gift Successfully']);
    }
}
